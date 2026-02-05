@extends('paginas.app')

@section('title', 'Panel de Gestión')

@section('css')
<style>
    .admin-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }
    .admin-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .admin-header h1 {
        color: #2c3e50;
        font-size: 2.5rem;
    }
    .admin-header p {
        color: #7f8c8d;
    }
    
    /* Grid de Tarjetas */
    .admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .admin-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 1px solid #eee;
    }

    .admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        border-color: #3498db;
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #eaf2f8;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        color: #3498db;
        font-size: 2rem;
        transition: background-color 0.3s, color 0.3s;
    }

    .admin-card:hover .icon-wrapper {
        background-color: #3498db;
        color: white;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .card-desc {
        font-size: 0.9rem;
        color: #7f8c8d;
    }
</style>
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