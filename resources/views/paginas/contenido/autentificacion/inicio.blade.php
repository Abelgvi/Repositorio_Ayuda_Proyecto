@extends('paginas.app')

@section('title', 'Iniciar sesión')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<section class="login-section">
    <h1 class="login-titulo">Iniciar sesión</h1>

    <div class="login-wrapper">
        <form class="login-form">
            <label>Email</label>
            <input type="email" placeholder="correo@ejemplo.com" required>

            <label>Contraseña</label>
            <input type="password" placeholder="••••••••" required>

            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>

    <p style="margin-top:20px;">
        ¿No tienes cuenta?
        <a href="{{ url('/registro') }}">Regístrate</a>
    </p>
</section>
@endsection
