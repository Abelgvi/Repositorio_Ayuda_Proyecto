<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña - PetPoint</title>
    <link rel="stylesheet" href="{{ asset('css/EstilosEstatico.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
</head>
<body>
<div class="profile-wrapper">
    <div class="profile-card">
        <h2 class="user-name">Cambiar Contraseña</h2>

        @if(session('success_msg'))
            <p class="status-msg msg-success">{{ session('success_msg') }}</p>
        @endif

        @if(session('error_msg') || $errors->any())
            <p class="status-msg msg-error">Error. Introduce los datos correctamente</p>
        @endif

        <form action="{{ route('password.update') }}" method="POST" class="profile-buttons">
            @csrf
            <input type="password" name="old_password" placeholder="Colocar contraseña antigua" class="btn-s input-form" required>
            <input type="password" name="new_password" placeholder="Colocar contraseña nueva" class="btn-s input-form" required>
            <input type="password" name="new_password_confirmation" placeholder="Confirmar contraseña nueva" class="btn-s input-form" required>

            <button type="submit" class="btn-p">Enviar</button>
            <a href="{{ url('/perfil') }}" class="link-back">← Volver al perfil</a>
        </form>
    </div>
</div>
</body>
</html>