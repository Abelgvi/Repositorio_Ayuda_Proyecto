@extends('paginas.app')

@section('title', 'Gestión de Productos')

@section('css')
<style>
    .admin-table-container { max-width: 1200px; margin: 40px auto; padding: 20px; }
    .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    .btn-add { background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
    
    table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    th, td { padding: 15px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background-color: #f8f9fa; color: #2c3e50; }
    
    /* Estilo para la imagen Base64 */
    .img-preview { width: 60px; height: 60px; object-fit: contain; border: 1px solid #eee; border-radius: 5px; }
    .btn-action { padding: 5px 10px; border-radius: 4px; border: none; cursor: pointer; color: white; margin-right: 5px;}
    .btn-delete { background: #e74c3c; }
</style>
@endsection

@section('content')
<div class="admin-table-container">
    <div class="top-bar">
        <h1>Productos</h1>
        <a href="{{ route('admin.productos.create') }}" class="btn-add">+ Nuevo Producto</a>
    </div>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $prod)
            <tr>
                <td>
                    
                    @if($prod->imagen)
                        <img src="{{ $prod->imagen }}" class="img-preview" alt="Producto">
                    @else
                        <span>Sin foto</span>
                    @endif
                </td>
                <td>{{ $prod->nombre }}</td>
                <td>{{ $prod->categoria }}</td>
                <td>{{ $prod->precio }} €</td>
                <td>{{ $prod->stock }}</td>
                <td>
                    <form action="{{ route('admin.productos.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('¿Borrar este producto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">
                            <i class="fa-solid fa-trash">Eliminar</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        <a href="{{ route('admin.panel') }}" style="color: #7f8c8d; text-decoration: none;">&larr; Volver al Panel</a>
    </div>
</div>
@endsection