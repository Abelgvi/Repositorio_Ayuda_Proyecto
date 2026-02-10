<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{
public function show()
    {
        $user = Auth::user();
        // Cargamos SOLO los animales asociados a este usuario
        $animales = $user->animales;
        
        return view('paginas.users.perfil', compact('user', 'animales'));
    }




    /**
     * Muestra el formulario de cambio de contraseña.
     */
    public function editPassword()
    {
        // Ajustado al nombre exacto de tu archivo: password_change.blade.php
        return view('paginas.users.password_change');
    }

    /**
     * Procesa la actualización de la contraseña.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validación: 'confirmed' exige que exista un campo 'new_password_confirmation'
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Verificar si la contraseña antigua coincide con la de la BD
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error_msg', 'Error. Introduce los datos correctamente');
        }

        // Actualizar y encriptar
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success_msg', 'Se ha cambiado tu contraseña correctamente');
    }

    /**
     * Muestra la lista de favoritos del usuario.
     */
    public function favoritos()
    {
        // Si es admin, lo mandamos de vuelta o al panel de admin
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/panel'); 
        }

        $productosFavoritos = Auth::user()->favoritos ?? collect(); 
        return view('paginas.users.favoritos', compact('productosFavoritos'));
    }



    // 1. Mostrar el formulario
    public function createAnimal()
    {
        return view('paginas.users.crear_mascota');
    }

    // 2. Guardar en la base de datos
    public function storeAnimal(Request $request)
    {
        // Validación básica
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string'
        ]);

        // Crear la mascota asociada al usuario conectado
        // Laravel rellena automáticamente 'user_id' gracias a la relación
        Auth::user()->animales()->create([
            'nombre' => $request->nombre,
            'especie' => $request->especie
        ]);

        return redirect()->route('perfil.show');
    }
}