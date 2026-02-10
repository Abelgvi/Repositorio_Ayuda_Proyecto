<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{
    // 1. Mostrar el carrito
    public function index()
    {
        $carrito = session()->get('carrito', []);
        $total = 0;

        foreach($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('paginas.contenido.carrito.carrito', compact('carrito', 'total'));
    }

    // 2. Añadir producto al carrito
    public function add(Request $request)
    {
        $producto = Producto::findOrFail($request->id_producto);
        $carrito = session()->get('carrito', []);

        // Si el producto ya está, aumentamos la cantidad
        if(isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad']++;
        } else {
            // Si no está, lo añadimos
            $carrito[$producto->id] = [
                "id" => $producto->id,
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', '¡Producto añadido al carrito!');
    }

    // 3. Eliminar producto del carrito
    public function remove($id)
    {
        $carrito = session()->get('carrito');

        if(isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto eliminado');
    }

    // 4. Vaciar carrito completo
    public function clear()
    {
        session()->forget('carrito');
        return redirect()->back()->with('success', 'Carrito vaciado');
    }
}