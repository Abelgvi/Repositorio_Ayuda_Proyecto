<?php

namespace App\Http\Controllers;

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
}