<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Muestra la vista de registro
    public function showRegistrationForm()
    {
        return view('paginas.contenido.autentificacion.registro');
    }

    // Procesa el registro de nuevos usuarios
    public function register(Request $request)
    {
        // 1. Validar todos los campos (incluidos los nuevos)
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255', // Tu campo apellidos
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',     // Tu campo teléfono
            'password' => 'required|string|min:8|confirmed', // 'confirmed' busca un campo 'password_confirmation' en el form
        ]);

        // 2. Crear el usuario en la BD
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'cliente', // Forzamos que quien se registre sea cliente
        ]);

        // 3. Iniciar sesión automáticamente
        Auth::login($user);

        // 4. Redirigir al home
        return redirect()->route('home')->with('success', '¡Registro completado con éxito!');
    }
}