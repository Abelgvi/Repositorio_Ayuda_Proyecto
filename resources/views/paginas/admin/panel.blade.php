@extends('paginas.app')

@section('title', 'Panel de Gestión')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">


@endsection

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>Panel de Administración</h1>
        <p>Bienvenido, {{ Auth::user()->name }}. Selecciona qué quieres gestionar hoy.</p>
    </div>

    <div class="admin-grid">
        {{-- Enlace actualizado a la URL directa del recurso --}}
        <a href="{{ url('/admin/productos') }}" class="admin-card">
            <div class="icon-wrapper">
                <i class="fa-solid fa-box-open"></i>
            </div>
            <div class="card-title">Productos</div>
            <div class="card-desc">Añadir, editar o eliminar productos de la tienda.</div>
        </a>

        <a href="#" class="admin-card">
            <div class="icon-wrapper">
                <i class="fa-solid fa-calendar-check"></i>
            </div>
            <div class="card-title">Citas Peluquería</div>
            <div class="card-desc">Ver agenda y gestionar citas pendientes.</div>
        </a>

        <a href="#" class="admin-card">
            <div class="icon-wrapper">
                <i class="fa-solid fa-calendar-day"></i>
            </div>
            <div class="card-title">Eventos</div>
            <div class="card-desc">Crear talleres y gestionar inscripciones.</div>
        </a>

        <a href="#" class="admin-card">
            <div class="icon-wrapper">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="card-title">Usuarios</div>
            <div class="card-desc">Ver lista de clientes registrados.</div>
        </a>
    </div>
</div>
@endsection