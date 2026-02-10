<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    public function index()
    {
        // 1. DESTACADOS: 4 productos aleatorios
        $destacados = Producto::where('activo', 1) 
                              ->inRandomOrder()
                              ->take(4)
                              ->get();

        // 2. OFERTAS: Los 4 más baratos
        $ofertas = Producto::where('activo', 1)
                           ->orderBy('precio', 'asc')
                           ->take(4)
                           ->get();

        // 3. ANIMALES 
        // Inicializamos la variable vacía por defecto para evitar errores si no entra al if
        $recomendados = collect(); 

        if (Auth::check()) {
            $user = Auth::user();

            // Obtenemos las especies de sus animales (ej: ['perro', 'gato']) sin duplicados
            $especies = $user->animales->pluck('especie')->unique();

            if ($especies->isNotEmpty()) {
                // Buscamos productos activos que coincidan con esas especies
                $recomendados = Producto::where('activo', 1)
                    ->whereIn('animal_objetivo', $especies)
                    ->inRandomOrder()
                    ->take(4)
                    ->get();
            }
        }

        // Enviamos las tres listas a la vista
        return view('paginas.home.index', compact('destacados', 'ofertas', 'recomendados'));
    }
}