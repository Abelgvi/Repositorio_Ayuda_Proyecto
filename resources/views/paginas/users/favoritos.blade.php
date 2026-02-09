<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Favoritos - PetPoint</title>
    <link rel="stylesheet" href="{{ asset('css/EstilosEstatico.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
</head>
<body>
    <div class="favoritos-container">
        <h1 class="user-name text-center">Mis Favoritos</h1>
        <a href="{{ url('/perfil') }}" class="btn-s btn-return">← Volver al Perfil</a>

        <div class="favoritos-grid">
            @forelse($productosFavoritos as $producto)
                <div class="producto-card">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                    <h3>{{ $producto->nombre }}</h3>
                    <p class="price-tag">{{ number_format($producto->precio, 2) }} €</p>
                    <a href="{{ url('/tienda/' . $producto->id) }}" class="btn-p">Ver producto</a>
                </div>
            @empty
                <p class="no-favoritos">No tienes productos en favoritos.</p>
            @endforelse
        </div>
    </div>
</body>
</html>