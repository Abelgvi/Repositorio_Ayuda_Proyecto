<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function index()
    {
        $citas = collect(); // Lista vacía por defecto

        if (Auth::check()) {
            // Si está logueado, sacamos sus citas ordenadas por fecha
            $citas = Cita::where('user_id', Auth::id())
                         ->orderBy('fecha_cita', 'desc')
                         ->get();
        }

        return view('paginas.contenido.peluqueria.peluqueria', compact('citas'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'servicio' => 'required|in:baño,corte,deslanado,completo'
        ]);

        $fechaCompleta = $request->fecha . ' ' . $request->hora;
        $user = Auth::user();

        // --- VALIDACIÓN 1: ¿Ese hueco ya está ocupado por ALGUIEN? ---
        $citaOcupada = Cita::where('fecha_cita', $fechaCompleta)
                            ->where('estado', '!=', 'cancelada') // Ignoramos las canceladas
                            ->exists();

        if ($citaOcupada) {
            return back()->with('error', 'Lo sentimos, ese horario ya está reservado. Por favor, elige otra hora.');
        }

        // --- VALIDACIÓN 2: ¿El usuario ya tiene una cita ESE DÍA? ---
        $yaTieneCitaHoy = Cita::where('user_id', $user->id)
                              ->whereDate('fecha_cita', $request->fecha) // Compara solo el día (Y-m-d)
                              ->where('estado', '!=', 'cancelada')
                              ->exists();

        if ($yaTieneCitaHoy) {
            return back()->with('error', 'Solo permitimos una reserva por día. Ya tienes una cita pendiente para esta fecha.');
        }

        // Si pasa las validaciones, creamos la cita
        Cita::create([
            'user_id' => $user->id,
            'fecha_cita' => $fechaCompleta,
            'tipo_servicio' => $request->servicio,
            'estado' => 'pendiente'
        ]);

        return back()->with('success', '¡Cita solicitada correctamente!');
    }



    // Método para cambiar estado (ADMIN)
    public function updateStatus(Request $request, $id)
    {
        // Seguridad: Solo admin puede tocar esto
        if (auth()->user()->role !== 'admin') {
            return redirect('/');
        }

        $cita = Cita::findOrFail($id);
        
        // Validamos que el estado sea uno de los permitidos por tu BBDD
        $nuevoEstado = $request->estado; // vendrá 'confirmada' o 'cancelada'
        
        if ($nuevoEstado == 'confirmada' || $nuevoEstado == 'cancelada') {
            $cita->estado = $nuevoEstado;
            $cita->save();
            return back()->with('success', 'Estado de la cita actualizado a: ' . $nuevoEstado);
        }

        return back()->with('error', 'Estado no válido');
    }
}