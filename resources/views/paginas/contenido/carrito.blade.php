@extends('paginas.app')

@section('title', 'Pet Point - Carrito')

@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('css/carrito.css') }}">

<main class="carrito">
    <h1>Carrito de la compra</h1>

    <div id="carrito-contenido"></div>

    <div class="carrito-total">
        <h2>Total: <span id="total">0€</span></h2>
        <button class="btn-comprar">Finalizar compra</button>
    </div>
</main>

<script src="{{ asset('js/carrito.js') }}"></script>

@endsection