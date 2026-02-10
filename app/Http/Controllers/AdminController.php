<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Verificar si es admin (Doble seguridad)
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        return view('paginas.admin.panel');
    }

    

    public function citas()
    {
        // Verificar si es admin
        if (auth()->user()->role !== 'admin') {
            return redirect('/');
        }

        // Obtenemos las citas ordenadas por fecha (más recientes primero)
        // Usamos 'with' para traer los datos del usuario y evitar muchas consultas
        $citas = Cita::with('usuario')->orderBy('fecha_cita', 'desc')->get();

        return view('paginas.admin.citas', compact('citas'));
    }
}