<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/EstilosEstatico.css') }}">
    <!-- CSS específico de cada página -->
    @yield('css')
</head>

@stack('scripts')


<body>
<header class="header">
  <nav class="nav">
    <a href="{{ url('/') }}" class="logo">
      Pet Point
    </a>

    <ul class="nav-center">
      <li class="dropdown">
        <a href="#">Sobre Nosotros</a>
        <ul class="submenu">
          <li><a href="{{ url('/galeria') }}">Galería</a></li>
          <li><a href="{{ url('/contacto') }}">Contacto</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Servicios</a>
        <ul class="submenu">
          <li><a href="{{ url('/peluqueria') }}">Peluquería</a></li>
          <li><a href="{{ url('/talleres') }}">Talleres / Eventos</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="{{ url('/tienda') }}">Tienda</a>
        <ul class="submenu">
          <li><a href="#">Alimentación</a></li>
          <li><a href="#">Higiene</a></li>
          <li><a href="#">Accesorios</a></li>
          <li><a href="#">Farmacia</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav-right">
<li>
  <a href="{{ url('/carrito') }}" class="btn">Carrito</a>
</li>
      <li><a href="{{ url('/autentificacion') }}" class="btn">Registro / Inicio</a></li>
    </ul>
  </nav>
</header>

@yield('content')

<footer class="footer">
    <p>© 2025 Pet Point</p>
</footer>

</body>
</html>
