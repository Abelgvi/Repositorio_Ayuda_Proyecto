@extends('paginas.app')

@section('title', 'Registro')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<section class="login-section">
    <h1 class="login-titulo">Crear cuenta</h1>

    <div class="login-wrapper">
        <form class="login-form">
            <label>Nombre</label>
            <input type="text" required>

            <label>Email</label>
            <input type="email" required>

            <label>Contraseña</label>
            <input type="password" required>

            <label>Confirmar contraseña</label>
            <input type="password" required>

            <button type="submit" class="btn">Registrarse</button>
        </form>
    </div>

    <p style="margin-top:20px;">
        ¿Ya tienes cuenta?
        <a href="{{ url('/login') }}">Inicia sesión</a>
    </p>
</section>
@endsection
