@extends('paginas.app')

@section('title', 'Iniciar sesión')

@section('css')

<link rel="stylesheet" href="{{ asset('css/autentificacion.css') }}">
@endsection

@section('content')
<section class="login-section">
    <h1 class="login-titulo">Iniciar sesión</h1>

    <div class="login-wrapper">
       
        <form class="login-form" method="POST" action="{{ route('login.submit') }}">
            
            
            @csrf

            
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="email">Email</label>
           
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="correo@ejemplo.com" 
                value="{{ old('email') }}" 
                required 
                autofocus
            >

            <label for="password">Contraseña</label>
            {{-- 5. Agregamos name="password" --}}
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="••••••••" 
                required
            >

            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>

    <p>
        ¿No tienes cuenta?
        <a href="{{ url('/registro') }}">Regístrate</a>
    </p>
</section>
@endsection