<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - PetPoint</title>
    <link rel="stylesheet" href="{{ asset('css/EstilosEstatico.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="{{ url('/') }}" class="logo">PetPoint</a>
        </nav>
    </header>

    <div class="profile-wrapper">
        <div class="profile-card">
            <h1 class="user-name">{{ Auth::user()->name }}</h1>
            <p class="user-email">{{ Auth::user()->email }}</p>
            
            <div class="profile-buttons">
                {{-- Este botón lo ven todos (Admin y Usuarios) --}}
                <a href="{{ url('/password/edit') }}" class="btn-p">
                    Cambiar Contraseña
                </a>

                {{-- Este botón SOLO lo ven los que NO son admin --}}
                @if(Auth::user()->role !== 'admin')
                <a href="{{ url('/favoritos') }}" class="btn-s">
                Lista de Favoritos
                </a>
                @endif
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>© 2025 Pet Point</p>
    </footer>
</body>
</html>