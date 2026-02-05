<?php

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
}