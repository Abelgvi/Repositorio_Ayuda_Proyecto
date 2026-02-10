<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra la vista de login
    public function showLoginForm()
    {
        return view('paginas.contenido.autentificacion.inicio');
    }

    // Procesa el inicio de sesión
    public function login(Request $request)
    {
        // 1. Validar los datos del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Intentar loguear
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 3. Redirección inteligente según el ROL
            $user = Auth::user();

            if ($user->role === 'admin') {
                // Si tienes un panel de admin, redirige allí. 
                // Si no, mándalo al home pero con permisos de admin.
                return redirect()->intended(route('home')); 
            }

            // Si es cliente, va a la página de inicio o a donde intentaba ir
            return redirect()->intended(route('home'));
        }

        // 4. Si falla, volver atrás con error
        return back()->withErrors([
            'email' => 'El correo o la contraseña no son correctos.',
        ])->onlyInput('email');
    }

    // Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Adldap\Laravel\Facades\Adldap;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de login
     */
    public function showLoginForm()
    {
        return view('paginas.contenido.autentificacion.inicio');
    }

    /**
     * Procesa el login de clientes (MySQL) y admins (LDAP)
     */
    public function login(Request $request)
    {
        // 1. Validación básica del formulario
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // ---------------------------------------------------------
        // PRIMERA PARTE: CLIENTES (MySQL)
        // ---------------------------------------------------------
        //
        // Si el usuario existe en MySQL → es cliente.
        // Los admins NO existen en MySQL, así que no entran aquí.
        //
        // ---------------------------------------------------------

        $cliente = User::where('email', $request->email)->first();

        if ($cliente) {

            // Intento de login con MySQL
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                // Login correcto → regeneramos sesión
                $request->session()->regenerate();
                return redirect()->intended(route('home'));
            }

            // Si existe en MySQL pero la contraseña no coincide
            return back()->withErrors([
                'email' => 'Credenciales incorrectas.',
            ]);
        }

        // ---------------------------------------------------------
        // SEGUNDA PARTE: ADMINS (LDAP)
        // ---------------------------------------------------------
        //
        // Si NO existe en MySQL → puede ser un admin LDAP.
        // Aquí el campo "email" del formulario realmente es el UID del LDAP.
        //
        // ---------------------------------------------------------

        // Intento de autenticación LDAP
        if (Adldap::auth()->attempt($request->email, $request->password)) {

            // Guardamos el UID del admin en sesión
            // Esto sirve para identificarlo como admin en toda la app
            session(['ldap_admin' => $request->email]);

            return redirect()->intended(route('home'));
        }

        // ---------------------------------------------------------
        // TERCERA PARTE: FALLÓ TODO
        // ---------------------------------------------------------

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }

    /**
     * Cierra sesión tanto de clientes como de admins LDAP
     */
    public function logout(Request $request)
    {
        // Logout de clientes
        Auth::logout();

        // Logout de admins LDAP
        session()->forget('ldap_admin');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
