@extends('paginas.app')

@section('title', 'Pet Point - Peluquería')

@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
<!-- MAIN: contenido principal de la página -->
  <main class="contenido" style="padding-top:160px;">
    <div class="contenido-wrapper">

      <!-- Sección de contacto -->
      <section class="contacto-section">

        <!-- Contenedor general del contenido de contacto -->
        <div class="contacto-container">

          <!-- Columna izquierda con los datos de contacto -->
          <div class="contacto-col contacto-datos">
            <h3 class="contacto-subtitulo">Nuestros Datos</h3>

            <!-- Información de teléfono -->
            <div class="info-item">
              <p><strong>Teléfono:</strong> +34 604 19 48 86</p>
            </div>

            <!-- Información de dirección -->
            <div class="info-item">
              <p><strong>Dirección:</strong> Calle Falsa 123, Santander</p>
            </div>

            <!-- Información de correo electrónico -->
            <div class="info-item">
              <p><strong>Email:</strong> contacto@petpoint.com</p>
            </div>
          </div>

          <!-- Separador visual entre columnas -->
          <div class="divisor-vertical"></div>

          <!-- Columna derecha con el formulario de contacto -->
          <div class="contacto-col contacto-formulario">
            <h3 class="contacto-subtitulo">Escríbenos</h3>

            <!-- Formulario para enviar un mensaje -->
            <form class="login-form">

              <!-- Campo para introducir el email -->
              <label for="email">Tu Email:</label>
              <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>

              <!-- Campo para escribir el mensaje -->
              <label for="mensaje">Mensaje:</label>
              <textarea id="mensaje" name="mensaje" rows="5"
                placeholder="¿En qué podemos ayudarte?" required></textarea>

              <!-- Botón para enviar el formulario -->
              <button type="submit" class="btn">Enviar Mensaje</button>
            </form>
          </div>
        </div>
      </section>

    </div>
  </main>
@endsection
