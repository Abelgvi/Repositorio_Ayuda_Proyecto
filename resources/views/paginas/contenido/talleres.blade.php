@extends('paginas.app')

@section('title', 'Pet Point - Talleres')

@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/talleres.css') }}">
 <main class="contenido" style="min-height:auto; padding-top:120px;">
    <div class="contenido-wrapper">

      <!-- Imagen destacada relacionada con los talleres -->
      <div class="imagen-talleres">
        <img src="../../img/NAVIDAD.jpeg" alt="Talleres de Navidad Pet Point">
      </div>

      <!-- Sección que contiene los eventos y talleres -->
      <section class="eventos-section">

        <!-- Título principal de la sección -->
        <h2 class="eventos-titulo"> Talleres y Eventos de Navidad</h2>

        <!-- Texto descriptivo de los eventos -->
        <p class="eventos-subtitulo">
          ¡Ven y aprende con nuestras actividades navideñas para toda la familia!
        </p>

        <!-- Contenedor de las tarjetas de eventos -->
        <div class="eventos-grid">

          <!-- Tarjeta del primer evento -->
          <div class="evento-card">
            <h3 class="evento-titulo">Taller de Cuidado de Mascotas</h3>
            <p class="evento-descripcion">
              Aprende a cuidar correctamente a tus futuras mascotas adoptadas durante estas fechas especiales.
            </p>
            <p class="evento-fecha">Fecha: 22 de Diciembre</p>
            <button class="btn">Inscribirse</button>
          </div>

          <!-- Tarjeta del segundo evento -->
          <div class="evento-card">
            <h3 class="evento-titulo">Navidad en la Tienda</h3>
            <p class="evento-descripcion">
              Disfruta de juegos, fotos personalizadas navideñas con tus mascotas y actividades para toda la familia en
              nuestra tienda.
            </p>
            <p class="evento-fecha">Fecha: 24 de Diciembre</p>
            <button class="btn">Ver Más</button>
          </div>

        </div>
      </section>
    </div>
  </main>
@endsection
