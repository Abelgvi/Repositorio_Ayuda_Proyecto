@extends('paginas.app')

@section('title', 'Añadir Mascota')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/crearMascota.css') }}">
@endsection

@section('content')
    <div class="mascota-form-section">
        <h1>Añadir Nueva Mascota</h1>

        <form action="{{ route('animal.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                {{-- Campo: Nombre --}}
                <div>
                    <label for="nombre">Nombre de la mascota:</label>
                    <input type="text" id="nombre" name="nombre" required placeholder="Ej: Toby">
                </div>

                {{-- Campo: Especie --}}
                <div>
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
            </div>

            <div class="button-group">
                <button type="submit">Guardar Mascota</button>
                <a href="{{ route('perfil.show') }}">Cancelar</a>
            </div>
        </form>
    </div>
@endsection