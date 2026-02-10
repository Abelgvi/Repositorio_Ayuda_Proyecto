@extends('paginas.app')
@section('title', 'Pet Point - Navidad en la Tienda')

@section('css')
<link rel="stylesheet" href="{{ asset('css/taller_navidad.css') }}">
@endsection

@section('content')
<div class="contenido">
    <!-- Header del Evento -->
    <div class="evento-header">
        <h1> Navidad en la Tienda </h1>
        <p style="font-size: 1.2rem; margin: 15px 0;">¡La celebración más especial del año para ti y tu mascota!</p>
        <div class="fecha-destacada">
            24 de Diciembre | 12:00 - 16:00 
        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="evento-contenido">
        <!-- Imagen Principal -->
        <div class="evento-imagen">
            <img src="{{ asset('img/NAVIDAD.jpeg') }}" alt="Navidad en Pet Point">
        </div>

        <!-- Descripción General -->
        <div class="info-section">
            <h2>Sobre el Evento</h2>
            <p>
                ¡Celebra la Navidad con nosotros en Pet Point! Te invitamos a ti y a tu mascota a disfrutar 
                de un día lleno de diversión, amor y magia navideña. Tendremos actividades especiales, 
                sesiones fotográficas profesionales con temática navideña, juegos interactivos y muchas 
                sorpresas más. ¡Será un día inolvidable para toda la familia peluda!
            </p>
        </div>

        <!-- Actividades -->
        <div class="info-section">
            <h2>Actividades del Día</h2>
            <div class="actividades-grid">
                <div class="actividad-card">
                    <h3>Sesión Fotográfica</h3>
                    <p>Fotos profesionales navideñas con tu mascota. ¡Recibe tu foto impresa al instante!</p>
                </div>
                
                <div class="actividad-card">
                    <h3>Zona de Juegos</h3>
                    <p>Área especial con juegos y actividades interactivas para que tu mascota se divierta.</p>
                </div>
                
                <div class="actividad-card">
                    <h3>Regalos Sorpresa</h3>
                    <p>Cada mascota recibirá un regalo especial navideño. ¡Habrá premios y descuentos en tienda!</p>
                </div>
                
                <div class="actividad-card">
                    <h3>Aperitivo Navideño</h3>
                    <p>Galletas y tartas especiales para mascotas, completamente gratis y saludables.</p>
                </div>
            </div>
        </div>

        <!-- Detalles Importantes -->
        <div class="detalles-importantes">
            <h3>Detalles Importantes</h3>
            <ul class="detalles-lista">
                <li><strong>Horario:</strong> 12:00 - 16:00 </li>
                <li><strong>Ubicación:</strong> Pet Point - Carretres 123</li>
                <li><strong>Entrada:</strong> Completamente GRATIS</li>
                <li><strong>Incluye:</strong> Sesión de fotos, aperitivo, regalo y actividades</li>
                <li><strong>Recomendación:</strong> Trae a tu mascota con correa o transportin por seguridad</li>
                <li><strong>Requisito:</strong> Solicitud de inscripcion al evento aceptada, cartilla de vacunación y desparasitación al día</li>
            </ul>
        </div>

        <!-- Inscripción -->
        <div class="inscripcion-container">
            <a href="{{ route('inscripcion.create', 'navidad-en-la-tienda') }}" class="btn-inscribir">¡Inscríbete Ahora!</a>
           
            <br>
            <a href="{{ route('talleres.index') }}" class="btn-volver">← Volver a Talleres</a>
        </div>
    </div>
</div>
@endsection