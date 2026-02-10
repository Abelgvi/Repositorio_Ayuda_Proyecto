@extends('paginas.app')

@section('title', 'Tienda')

@section('css')
<link rel="stylesheet" href="{{ asset('css/tienda.css') }}">
@endsection




@section('content')
<div class="shop-container">

    <aside class="filters">
        <h3>Filtros</h3>

        <div class="filter-group">
            <h4>Animal</h4>
            <ul>
                <li><label><input type="checkbox" name="animal[]" value="perro"> Perro</label></li>
                <li><label><input type="checkbox" name="animal[]" value="gato"> Gato</label></li>
                <li><label><input type="checkbox" name="animal[]" value="ave"> Ave</label></li>
                <li><label><input type="checkbox" name="animal[]" value="roedor"> Roedor</label></li>
                <li><label><input type="checkbox" name="animal[]" value="pez"> Peces</label></li>
                <li><label><input type="checkbox" name="animal[]" value="reptiles"> Reptiles</label></li>
            </ul>
        </div>

        <div class="filter-group">
            <h4>Categoría</h4>
            <ul>
                <li><label><input type="checkbox" name="categoria[]" value="Alimentación"> Alimentación</label></li>
                <li><label><input type="checkbox" name="categoria[]" value="Higiene"> Higiene</label></li>
                <li><label><input type="checkbox" name="categoria[]" value="Accesorios"> Accesorios</label></li>
                <li><label><input type="checkbox" name="categoria[]" value="Farmacia"> Farmacia</label></li>
            </ul>
        </div>
    </aside>

    <section class="products-section">
        <h1>Nuestros Productos</h1>

        <div id="products-container">
            @include('paginas.contenido.tienda.list')
        </div>
    </section>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/gestorTienda.js') }}"></script>
@endpush
