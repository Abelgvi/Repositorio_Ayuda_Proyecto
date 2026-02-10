@extends('paginas.app')

@section('title', 'Mi Perfil')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/crearMascota.css') }}">
@endsection

@section('content')
    <div class="perfil-container">
        <h1>Mi Perfil</h1>
        
        <div class="perfil-grid">
            {{-- COLUMNA IZQUIERDA: Datos del usuario --}}
            <div class="perfil-left">
                <section>
                    <h2>Datos Personales</h2>
                    <ul>
                        <li><strong>Nombre:</strong> {{ $user->name }} {{ $user->lastname }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Teléfono:</strong> {{ $user->phone ?? 'No indicado' }}</li>
                        <li><strong>Fecha de registro:</strong> {{ $user->created_at->format('d/m/Y') }}</li>
                    </ul>
                </section>

                <section>
                    <h2>Mis Mascotas</h2>

                    @if($animales->count() > 0)
                        <ul>
                            @foreach($animales as $animal)
                                <li>
                                    <strong>{{ $animal->nombre }}</strong> - {{ ucfirst($animal->especie) }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No tienes mascotas registradas.</p>
                    @endif
                </section>
            </div>

            {{-- COLUMNA DERECHA: Formulario añadir mascota --}}
            <div class="perfil-right">
                <section class="form-card">
                    <h2>Añadir Nueva Mascota</h2>
                    
                    <form action="{{ route('animal.store') }}" method="POST">
                        @csrf

                        <div class="form-field">
                            <label for="nombre">Nombre de la mascota:</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="Ej: Toby">
                        </div>

                        <div class="form-field">
                            <label for="especie">Especie:</label>
                            <select id="especie" name="especie" required>
                                <option value="perro">Perro</option>
                                <option value="gato">Gato</option>
                                <option value="ave">Ave</option>
                                <option value="pez">Pez</option>
                                <option value="roedor">Roedor</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-buttons">
                            <button type="submit">Guardar Mascota</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection