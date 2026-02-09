<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // LISTAR (Apunta a paginas.admin.productos)
    public function index()
    {
        $productos = Producto::all();
        // CAMBIO: La vista ahora está directamente en admin/productos.blade.php
        return view('paginas.admin.productos', compact('productos'));
    }

    
    public function create()
    {
        // CAMBIO: La vista ahora está directamente en admin/crear_producto.blade.php
        return view('paginas.admin.crear_producto');
    }

    // GUARDAR (Lógica Base64)
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'required|image|max:2048', // Validación de imagen
            'animal_objetivo' => 'required'
        ]);

        $imagenBase64 = null;
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $contenido = file_get_contents($file);
            $base64 = base64_encode($contenido);
            // Formato DATA URI para que el navegador lo entienda
            $imagenBase64 = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        Producto::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'animal_objetivo' => $request->animal_objetivo,
            'imagen' => $imagenBase64, // Guardamos el Base64
            'activo' => 1
        ]);

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado correctamente');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return back()->with('success', 'Producto eliminado');
    }
}