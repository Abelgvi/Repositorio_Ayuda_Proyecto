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
            <li><a href="{{ url('/tienda?categoria[]=Alimentacion') }}">Alimentación</a></li>
            <li><a href="{{ url('/tienda?categoria[]=higiene') }}">Higiene</a></li>
            <li><a href="{{ url('/tienda?categoria[]=accesorios') }}">Accesorios</a></li>
            <li><a href="{{ url('/tienda?categoria[]=farmacia') }}">Farmacia</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav-right">
        <li>
          <a href="{{ url('/carrito') }}" class="btn">Carrito</a>
        </li>
        @guest
        <li class="nav-item">
          <a href="{{ url('/login') }}" class="btn">Iniciar Sesión</a>
        </li>

        @endguest

        @auth
        <li class="nav-item">
          <span class="user-greeting">
            Hola, {{ Auth::user()->name }}
          </span>

          @if(Auth::user()->role === 'admin')
          <a href="{{ url('/admin/panel') }}" class="nav-link">
            <i class="fa-solid fa-screwdriver-wrench"></i> Panel de Gestión
          </a>
          @endif



          <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer; color: #d9534f; font-weight: bold;">
              <i class="fa-solid fa-right-from-bracket"></i> Salir
            </button>
          </form>
        </li>
        @endauth
      </ul>
    </nav>
  </header>

  @yield('content')

  <footer class="footer">
    <p>© 2025 Pet Point</p>
  </footer>

</body>

</html>