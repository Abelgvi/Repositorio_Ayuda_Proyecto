@extends('paginas.app')

@section('title', 'Mi Carrito')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
@endsection

@section('content')
<main class="carrito-container">
    <h1>Tu Carrito de Compras</h1>

    @if(session('success'))
        <div class="mensaje-exito">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(empty($carrito) || count($carrito) == 0)
        <div class="carrito-vacio">
            <h3>Tu carrito está vacío</h3>
            <a href="{{ url('/tienda') }}" class="btn-seguir">Ir a la tienda</a>
        </div>
    @else
        <div class="carrito-grid">
            <div class="productos-lista">
                @foreach($carrito as $id => $item)
                <div class="producto-item">
                    @if(Str::startsWith($item['imagen'], 'data:image'))
                        <img src="{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}">
                    @else
                        <img src="{{ asset('storage/' . $item['imagen']) }}" alt="{{ $item['nombre'] }}">
                    @endif
                    
                    <div class="detalle">
                        <h3>{{ $item['nombre'] }}</h3>
                        <p>{{ number_format($item['precio'], 2) }} €</p>
                        <p>Cantidad: {{ $item['cantidad'] }}</p>
                    </div>

                    <div class="acciones">
                        <a href="{{ route('carrito.remove', $id) }}" class="btn-eliminar">
                            <i class="fa-solid fa-trash"></i> Eliminar
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="resumen-pago">
                <h2>Resumen</h2>
                <div class="total-row">
                    <span>Total a pagar:</span>
                    <span class="precio-total">{{ number_format($total, 2) }} €</span>
                </div>
                
                <a href="#" class="btn-pagar">Proceder al Pago</a>
                
                <a href="{{ route('carrito.clear') }}" class="btn-vaciar" onclick="return confirm('¿Vaciar todo?');">
                    Vaciar Carrito
                </a>
            </div>
        </div>
    @endif
</main>
@endsection