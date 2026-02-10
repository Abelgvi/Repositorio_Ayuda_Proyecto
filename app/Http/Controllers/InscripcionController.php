<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InscripcionController extends Controller
{
    /**
     * Muestra el formulario de inscripción para un evento específico
     */
    public function create($evento)
    {
        // Decodificar el nombre del evento de la URL
        $nombreEvento = ucfirst(str_replace('-', ' ', $evento));
        
        return view('paginas.contenido.inscripcion', compact('nombreEvento'));
    }

    /**
     * Almacena una nueva inscripción en la base de datos
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validator = Validator::make($request->all(), [
            'evento' => 'required|string|max:100',
            'nombre_completo' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'telefono' => 'required|string|max:20',
            'nombre_mascota' => 'nullable|string|max:100',
            'especie_mascota' => 'nullable|string|max:50',
            'edad_mascota' => 'nullable|string|max:20',
            'vacunas_al_dia' => 'nullable|boolean',
            'desparasitacion_al_dia' => 'nullable|boolean',
            'comentarios' => 'nullable|string|max:500',
        ], [
            'nombre_completo.required' => 'El nombre completo es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser válido',
            'telefono.required' => 'El teléfono es obligatorio',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Insertar en la base de datos usando Query Builder
            DB::table('inscripciones')->insert([
                'evento' => $request->evento,
                'nombre_completo' => $request->nombre_completo,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'nombre_mascota' => $request->nombre_mascota,
                'especie_mascota' => $request->especie_mascota,
                'edad_mascota' => $request->edad_mascota,
                'vacunas_al_dia' => $request->has('vacunas_al_dia') ? 1 : 0,
                'desparasitacion_al_dia' => $request->has('desparasitacion_al_dia') ? 1 : 0,
                'comentarios' => $request->comentarios,
                'estado' => 'pendiente', // Estado por defecto
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Redirigir a página de confirmación
            return redirect()->route('inscripcion.confirmacion')
                ->with('success', '¡Inscripción realizada con éxito!')
                ->with('evento', $request->evento)
                ->with('nombre', $request->nombre_completo);

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Hubo un error al procesar tu inscripción. Por favor, inténtalo de nuevo.')
                ->withInput();
        }
    }

    /**
     * Muestra la página de confirmación después de inscribirse
     */
    public function confirmacion()
    {
        // Verificar que se llegó aquí desde el formulario
        if (!session()->has('success')) {
            return redirect()->route('talleres.index');
        }

        return view('paginas.contenido.inscripcion_confirmada');
    }

    /**
     * Lista todas las inscripciones (panel admin)
     */
    public function index()
    {
        // Obtener todas las inscripciones ordenadas por fecha
        $inscripciones = DB::table('inscripciones')
            ->orderBy('created_at', 'desc')
            ->get();

        // Agrupar por evento para estadísticas
        $estadisticas = DB::table('inscripciones')
            ->select('evento', 
                DB::raw('count(*) as total'),
                DB::raw('sum(case when estado = "confirmada" then 1 else 0 end) as confirmadas'),
                DB::raw('sum(case when estado = "pendiente" then 1 else 0 end) as pendientes'),
                DB::raw('sum(case when estado = "cancelada" then 1 else 0 end) as canceladas')
            )
            ->groupBy('evento')
            ->get();

        return view('admin.inscripciones.index', compact('inscripciones', 'estadisticas'));
    }

    /**
     * Cambia el estado de una inscripción
     */
    public function cambiarEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,confirmada,cancelada'
        ]);

        try {
            DB::table('inscripciones')
                ->where('id', $id)
                ->update([
                    'estado' => $request->estado,
                    'updated_at' => now()
                ]);

            return redirect()->back()
                ->with('success', 'Estado actualizado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar el estado');
        }
    }

    /**
     * Elimina una inscripción
     */
    public function destroy($id)
    {
        try {
            DB::table('inscripciones')
                ->where('id', $id)
                ->delete();

            return redirect()->back()
                ->with('success', 'Inscripción eliminada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al eliminar la inscripción');
        }
    }
}