@extends('paginas.app')

@section('title', 'Inscripción - ' . $nombreEvento)

@section('css')
<link rel="stylesheet" href="{{ asset('css/inscripcion.css') }}">
@endsection

@section('content')
<div class="inscripcion-page">
    <div class="inscripcion-container-page">
        
        <!-- Título -->
        <h1 class="inscripcion-titulo">📝 Inscripción: {{ $nombreEvento }}</h1>
        
        <p class="inscripcion-intro">
            ¡Estás a un paso de unirte a este evento! Completa el formulario para reservar tu plaza.
        </p>

        <!-- Formulario de inscripción -->
        <form action="{{ route('inscripcion.store') }}" method="POST" class="inscripcion-form">
            @csrf

            <!-- Campo oculto con el nombre del evento -->
            <input type="hidden" name="evento" value="{{ $nombreEvento }}">

            <!-- Datos del participante -->
            <div class="form-section">
                <h2>Tus Datos</h2>
                
                <div class="form-group">
                    <label for="nombre_completo">Nombre Completo *</label>
                    <input type="text" id="nombre_completo" name="nombre_completo" required value="{{ old('nombre_completo') }}" placeholder="Ej: Juan Pérez">
                    @error('nombre_completo')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="tu@email.com">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" required value="{{ old('telefono') }}" placeholder="Ej: 612345678">
                    @error('telefono')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Datos de la mascota (opcional) -->
            <div class="form-section">
                <h2>Datos de tu Mascota <span class="opcional">(Opcional)</span></h2>
                
                <div class="form-group">
                    <label for="nombre_mascota">Nombre de la Mascota</label>
                    <input type="text" id="nombre_mascota" name="nombre_mascota" value="{{ old('nombre_mascota') }}" placeholder="Ej: Max">
                </div>

                <div class="form-group">
                    <label for="especie_mascota">Especie</label>
                    <select id="especie_mascota" name="especie_mascota">
                        <option value="">Selecciona...</option>
                        <option value="perro" {{ old('especie_mascota') == 'perro' ? 'selected' : '' }}>Perro</option>
                        <option value="gato" {{ old('especie_mascota') == 'gato' ? 'selected' : '' }}>Gato</option>
                        <option value="ave" {{ old('especie_mascota') == 'ave' ? 'selected' : '' }}>Ave</option>
                        <option value="roedor" {{ old('especie_mascota') == 'roedor' ? 'selected' : '' }}>Roedor</option>
                        <option value="pez" {{ old('especie_mascota') == 'pez' ? 'selected' : '' }}>Pez</option>
                        <option value="reptil" {{ old('especie_mascota') == 'reptil' ? 'selected' : '' }}>Reptil</option>
                        <option value="otro" {{ old('especie_mascota') == 'otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edad_mascota">Edad aproximada</label>
                    <input type="text" id="edad_mascota" name="edad_mascota" value="{{ old('edad_mascota') }}" placeholder="Ej: 3 años">
                </div>
            </div>

            <!-- Información adicional -->
            <div class="form-section">
                <h2>Información Adicional</h2>
                
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="vacunas_al_dia" name="vacunas_al_dia" value="1" {{ old('vacunas_al_dia') ? 'checked' : '' }}>
                    <label for="vacunas_al_dia">Mi mascota tiene la cartilla de vacunación al día</label>
                </div>

                <div class="form-group checkbox-group">
                    <input type="checkbox" id="desparasitacion_al_dia" name="desparasitacion_al_dia" value="1" {{ old('desparasitacion_al_dia') ? 'checked' : '' }}>
                    <label for="desparasitacion_al_dia">Mi mascota está desparasitada</label>
                </div>

                <div class="form-group">
                    <label for="comentarios">Comentarios o Necesidades Especiales</label>
                    <textarea id="comentarios" name="comentarios" rows="4" placeholder="¿Algo que debamos saber?">{{ old('comentarios') }}</textarea>
                </div>
            </div>

            <!-- Botones -->
            <div class="form-actions">
                <button type="submit" class="btn-submit">Confirmar Inscripción</button>
                <a href="{{ route('talleres.index') }}" class="btn-cancelar">Cancelar</a>
            </div>
        </form>

    </div>
</div>
@endsection