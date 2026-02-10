@extends('paginas.app')

@section('title', 'Peluquería Canina')

@section('content')

<main>
    <h1>Reserva tu Cita ✂️</h1>
    <p>Déjanos cuidar de tu mascota</p>

    {{-- MENSAJES DE ESTADO --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <hr>

    {{-- FORMULARIO --}}
    <h3>Nueva Reserva</h3>
    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        
        <div>
            <label><strong>1. Elige el día:</strong></label>
            <br>
            <input type="date" name="fecha" required min="{{ date('Y-m-d') }}">
        </div>
        <br>

        <div>
            <label><strong>2. Elige la hora:</strong></label>
            <br>
            <input type="hidden" name="hora" id="inputHora" required>
            
            {{-- Botones simples sin estilo --}}
            <button type="button" onclick="seleccionarHora('10:00')">10:00</button>
            <button type="button" onclick="seleccionarHora('11:00')">11:00</button>
            <button type="button" onclick="seleccionarHora('12:00')">12:00</button>
            <button type="button" onclick="seleccionarHora('13:00')">13:00</button>
            <button type="button" onclick="seleccionarHora('16:00')">16:00</button>
            <button type="button" onclick="seleccionarHora('17:00')">17:00</button>
            <button type="button" onclick="seleccionarHora('18:00')">18:00</button>
            <button type="button" onclick="seleccionarHora('19:00')">19:00</button>
            
            <p>Hora seleccionada: <strong><span id="textoHora">Ninguna</span></strong></p>
        </div>
        <br>

        <div>
            <label><strong>3. Tipo de Servicio:</strong></label>
            <br>
            <select name="servicio" required>
                <option value="">-- Selecciona --</option>
                <option value="baño">Baño</option>
                <option value="corte">Corte</option>
                <option value="deslanado">Deslanado</option>
                <option value="completo">Completo</option>
            </select>
        </div>
        <br>

        @auth
            <button type="submit">Confirmar Reserva</button>
        @else
            <a href="{{ route('login') }}">Inicia sesión para reservar</a>
        @endauth
    </form>

    <hr>

    {{-- TABLA DE HISTORIAL --}}
    @auth
        <h3>📅 Mis Citas</h3>
        
        @if($citas->count() > 0)
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Servicio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>{{ $cita->fecha_cita->format('d/m/Y') }}</td>
                        <td>{{ $cita->fecha_cita->format('H:i') }}</td>
                        <td>{{ ucfirst($cita->tipo_servicio) }}</td>
                        <td>{{ ucfirst($cita->estado) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aún no has realizado ninguna reserva.</p>
        @endif
    @endauth

</main>

<script>
    function seleccionarHora(hora) {
        // Actualizamos el input oculto que se envía al servidor
        document.getElementById('inputHora').value = hora;
        // Mostramos el texto visualmente para que sepa qué eligió
        document.getElementById('textoHora').innerText = hora;
    }
</script>
@endsection