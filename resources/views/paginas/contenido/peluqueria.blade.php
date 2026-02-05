@extends('paginas.app')

@section('title', 'Pet Point - Peluquería')

@section('css')
<link rel="stylesheet" href="{{ asset('css/peluqueria.css') }}">
@endsection

@section('content')
<main>
    <section class="peluqueria-header">
        <h1>Peluquería Canina</h1>
        <p>Reserva tu cita de forma rápida y sencilla</p>
    </section>

    <section class="peluqueria-cita">
        <div class="calendario">
            <h2>Selecciona un día</h2>
            <div class="calendario-contenido">
                <input type="date" class="input-fecha">

                <div class="calendario-info">
                    <h3>Información</h3>
                    <p>Selecciona una fecha disponible y elige tu horario preferido.</p>
                </div>
            </div>
        </div>

        <div class="horarios">
            <h2>Horarios disponibles</h2>
            <div class="horas-grid">
                <button><span>10:00</span></button>
                <button><span>11:00</span></button>
                <button><span>12:00</span></button>
                <button><span>16:00</span></button>
                <button><span>17:00</span></button>
                <button><span>18:00</span></button>
            </div>
        </div>

        <div class="formulario-cita">
            <h2>Datos de la cita</h2>
            <form>
                <input type="text" placeholder="Nombre del dueño" required>
                <input type="text" placeholder="Nombre de la mascota" required>

                <select required>
                    <option value="">Tipo de servicio</option>
                    <option>Baño básico</option>
                    <option>Corte de pelo</option>
                    <option>Baño + Corte completo</option>
                    <option>Paquete premium</option>
                </select>

                <button type="submit">Reservar cita</button>
            </form>
        </div>
    </section>
</main>
@endsection
