@forelse($productos as $producto)
<div class="product-card">

    <div class="product-image-container">
        <img src="{{ $producto->imagen ?? '/img/no-image.png' }}" alt="{{ $producto->nombre }}" class="product-image-placeholder">
        class="product-image-placeholder">
    </div>

    <div class="product-content">
        <h3>{{ $producto->nombre }}</h3>

        <span class="tag">
            {{ $producto->categoria ?? 'General' }}
        </span>

        <p>{{ number_format($producto->precio, 2) }} €</p>

        <form action="{{ route('carrito.add') }}" method="POST">
            @csrf
            <input type="hidden" name="id_producto" value="{{ $producto->id }}">

            <button type="submit" class="btn-primary btn-add-cart">
                <i class="fa-solid fa-cart-plus"></i> Añadir
            </button>
        </form>

    </div>

</div>
@empty
<div class="no-results">
    <h3>No hay productos</h3>
    <p>Prueba con otros filtros.</p>
</div>
@endforelse