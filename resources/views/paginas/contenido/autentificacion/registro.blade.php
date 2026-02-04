@extends('paginas.app')

@section('title', 'Registrarse')

@section('css')
<link rel="stylesheet" href="{{ asset('css/autentificacion.css') }}">
@endsection

@section('content')
<section class="login-section">
    <h1 class="login-titulo">Crear una cuenta</h1>

    <div class="login-wrapper">
        {{-- Formulario de Registro --}}
        {{-- Usamos url('/registro') que definimos en las rutas --}}
        <form class="login-form" method="POST" action="{{ url('/registro') }}">
            @csrf

            {{-- Nombre --}}
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" placeholder="Tu nombre" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
            @enderror

            {{-- Apellidos --}}
            <label for="lastname">Apellidos</label>
            <input type="text" id="lastname" name="lastname" placeholder="Tus apellidos" value="{{ old('lastname') }}" required>
            @error('lastname')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
            @enderror

            {{-- Teléfono --}}
            <label for="phone">Teléfono</label>
            <input type="tel" id="phone" name="phone" placeholder="600123456" value="{{ old('phone') }}">
            @error('phone')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
            @enderror

            {{-- Email --}}
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>
            @error('email')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
            @enderror

            {{-- Contraseña --}}
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
            @error('password')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
            @enderror

            {{-- Confirmar Contraseña (OBLIGATORIO para Laravel) --}}
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite la contraseña" required>

            <button type="submit" class="btn">Registrarse</button>
        </form>
    </div>

    <p>
        ¿Ya tienes cuenta?
        <a href="{{ url('/login') }}">Inicia sesión aquí</a>
    </p>
</section>
@endsection