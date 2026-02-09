<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Producto::query();

        // --- NUEVO FILTRO DE BÚSQUEDA ---
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nombre', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('descripcion', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('categoria', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filtros existentes...
        if ($request->filled('animal')) {
            $query->whereIn('animal_objetivo', $request->animal);
        }

        if ($request->filled('categoria')) {
            $query->whereIn('categoria', $request->categoria);
        }

        $productos = $query->paginate(200);

        // Mantenemos tu lógica AJAX para que los filtros laterales sigan funcionando
        if ($request->ajax() || $request->header('X-Requested-With') == 'XMLHttpRequest') {
            return view('paginas.contenido.tienda.list', compact('productos'))->render();
        }

        return view('paginas.contenido.tienda.tienda', compact('productos'));
    }
}