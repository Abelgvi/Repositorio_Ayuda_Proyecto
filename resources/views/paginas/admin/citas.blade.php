@extends('paginas.app')

@section('title', 'Gestión de Citas - Admin')

@section('content')
<div style="max-width: 1200px; margin: 40px auto; padding: 20px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>📅 Gestión de Peluquería</h1>
        <a href="{{ route('admin.panel') }}" style="background: #7f8c8d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Volver al Panel</a>
    </div>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #2c3e50; color: white; text-align: left;">
                    <th style="padding: 15px;">Fecha y Hora</th>
                    <th style="padding: 15px;">Cliente</th>
                    <th style="padding: 15px;">Servicio</th>
                    <th style="padding: 15px;">Estado Actual</th>
                    <th style="padding: 15px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                <tr style="border-bottom: 1px solid #eee;">
                    
                    {{-- FECHA (Formateada bonita) --}}
                    <td style="padding: 15px;">
                        <span style="font-weight: bold; font-size: 1.1em;">
                            {{ $cita->fecha_cita->format('d/m/Y') }}
                        </span>
                        <br>
                        <span style="color: #555;">
                            {{ $cita->fecha_cita->format('H:i') }}
                        </span>
                    </td>

                    {{-- CLIENTE --}}
                    <td style="padding: 15px;">
                        {{ $cita->usuario->name }} {{ $cita->usuario->lastname }}
                        <br>
                        <small style="color: #7f8c8d;">{{ $cita->usuario->email }}</small>
                    </td>

                    {{-- SERVICIO --}}
                    <td style="padding: 15px; text-transform: capitalize;">
                        {{ $cita->tipo_servicio }}
                    </td>

                    {{-- ESTADO (Etiquetas de color) --}}
                    <td style="padding: 15px;">
                        @if($cita->estado == 'pendiente')
                            <span style="background: #f1c40f; color: white; padding: 5px 10px; border-radius: 20px; font-size: 0.9em;">⏳ Pendiente</span>
                        @elseif($cita->estado == 'confirmada')
                            <span style="background: #27ae60; color: white; padding: 5px 10px; border-radius: 20px; font-size: 0.9em;">✅ Confirmada</span>
                        @else
                            <span style="background: #c0392b; color: white; padding: 5px 10px; border-radius: 20px; font-size: 0.9em;">❌ Cancelada</span>
                        @endif
                    </td>

                    {{-- ACCIONES (Solo si está pendiente) --}}
                    <td style="padding: 15px;">
                        @if($cita->estado == 'pendiente')
                            <div style="display: flex; gap: 10px;">
                                {{-- Botón ACEPTAR --}}
                                <form action="{{ route('admin.citas.update', $cita->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="estado" value="confirmada">
                                    <button type="submit" style="background: #27ae60; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer; font-weight: bold;">
                                        Aceptar
                                    </button>
                                </form>

                                {{-- Botón RECHAZAR --}}
                                <form action="{{ route('admin.citas.update', $cita->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="estado" value="cancelada">
                                    <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer; font-weight: bold;">
                                        Rechazar
                                    </button>
                                </form>
                            </div>
                        @else
                            <span style="color: #bdc3c7;">Gestionada</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection