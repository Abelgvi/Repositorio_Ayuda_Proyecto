@extends('paginas.app')
<!-- Indico que esta vista hereda la plantilla principal paginas.app -->

@section('title', 'Pet Point - Inicio')
<!-- Defino el título que se insertará en el layout principal -->

@section('content')
<!-- Inicio de la sección content, que se inyecta en el layout -->

@section('css')
<!-- Inicio de una sección para añadir CSS extra solo en esta página -->

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<!-- Cargo el CSS específico de la página de inicio -->

@endsection
<!-- Cierro la sección de CSS -->

<main class="contenido">
<!-- Contenedor principal del contenido de la página -->

  <section class="categories-section">
  <!-- Sección que muestra las categorías de animales -->

    <div class="category-item">
    <!-- Bloque de una categoría -->

      <a href="{{ url('/tienda?animal[]=perro') }}" class="category-circle">
      <!-- Enlace a la tienda filtrando por productos para perros -->

        <img src="{{ asset('img/perro.jpeg') }}" alt="Ver productos para Perros">
        <!-- Imagen representativa de la categoría -->

      </a>

      <p class="category-text">Perros</p>
      <!-- Texto que aparece debajo de la imagen -->
    </div>

    <div class="category-item">
      <a href="{{ url('/tienda?animal[]=gato') }}" class="category-circle">
        <img src="{{ asset('img/gato.jpeg') }}" alt="Ver productos para Gatos">
      </a>
      <p class="category-text">Gatos</p>
    </div>

    <div class="category-item">
      <a href="{{ url('/tienda?animal[]=ave') }}" class="category-circle">
        <img src="{{ asset('img/ave.jpg') }}" alt="Ver productos para Aves">
      </a>
      <p class="category-text">Aves</p>
    </div>

    <div class="category-item">
      <a href="{{ url('/tienda?animal[]=roedor') }}" class="category-circle">
        <img src="{{ asset('img/conj.jpeg') }}" alt="Ver productos para Roedores">
      </a>
      <p class="category-text">Roedores</p>
    </div>

    <div class="category-item">
      <a href="{{ url('/tienda?animal[]=peces') }}" class="category-circle">
        <!-- Filtro para productos de peces -->
        <img src="{{ asset('img/pez.jpg') }}" alt="Ver productos para Peces">
      </a>
      <p class="category-text">Peces</p>
    </div>

    <div class="category-item">
      <a href="{{ url('/tienda?animal[]=reptiles') }}" class="category-circle">
        <!-- Filtro para reptiles -->
        <img src="{{ asset('img/Tortuga.jpg') }}" alt="Ver productos para Reptiles">
      </a>
      <p class="category-text">Reptiles</p>
    </div>

  </section>

  <!-- Destacados -->
  <section class="featured">
  <!-- Sección de productos destacados -->

    <h2>Destacados</h2>
    <!-- Título de la sección -->

    <div class="product-grid">
    <!-- Contenedor en forma de cuadrícula para productos -->

      @foreach($destacados as $producto)
      <!-- Recorro la colección de productos destacados enviada desde el controlador -->

      <article class="product-card">
      <!-- Tarjeta individual de producto -->

        @if($producto->imagen)
        <!-- Si el producto tiene imagen -->

          <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
          <!-- Muestro la imagen del producto -->

        @else
          <div class="product-image-placeholder"></div>
          <!-- Si no tiene imagen, muestro un bloque vacío -->
        @endif

        <h3>{{ $producto->nombre }}</h3>
        <!-- Nombre del producto -->

        <span class="tag">{{ $producto->categoria }}</span>
        <!-- Categoría del producto -->

        <p>{{ number_format($producto->precio, 2) }} €</p>
        <!-- Precio formateado a dos decimales -->

        <form action="{{ route('carrito.add') }}" method="POST">
        <!-- Formulario para añadir el producto al carrito -->

            @csrf
            <!-- Token de seguridad obligatorio -->

            <input type="hidden" name="id_producto" value="{{ $producto->id }}">
            <!-- Envío oculto del ID del producto -->

            <button type="submit" class="btn-primary btn-add-cart">
                <i class="fa-solid fa-cart-plus"></i> Añadir
                <!-- Botón para añadir al carrito -->
            </button>

        </form>
      </article>

      @endforeach
      <!-- Fin del recorrido de productos -->

    </div>

    <!-- Ofertas -->
    <h2>Ofertas</h2>
    <!-- Título de la sección de ofertas -->

    <div class="product-grid">
    <!-- Rejilla de productos en oferta -->

      @foreach($ofertas as $producto)
      <!-- Recorro productos en oferta -->

      <article class="product-card oferta">
      <!-- Tarjeta de producto con clase especial para ofertas -->

        @if($producto->imagen)
          <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
        @else
          <div class="product-image-placeholder"></div>
        @endif

        <h3>{{ $producto->nombre }}</h3>
        
        <span class="tag">{{ $producto->categoria }}</span>

        <p>
          <span class="old-price">
            {{ number_format($producto->precio * 1.20, 2) }} €
          </span>
          <!-- Precio antiguo inflado para simular descuento -->

          <strong>{{ number_format($producto->precio, 2) }} €</strong>
          <!-- Precio actual -->
        </p>

        <form action="{{ route('carrito.add') }}" method="POST">
            @csrf

            <input type="hidden" name="id_producto" value="{{ $producto->id }}">

            <button type="submit" class="btn-primary btn-add-cart">
                <i class="fa-solid fa-cart-plus"></i> Añadir
            </button>
        </form>

      </article>
      @endforeach

    </div>

  </section>
  
</main>

@endsection
<!-- Cierro la sección content -->
