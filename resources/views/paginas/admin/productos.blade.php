@extends('paginas.app')

@section('title', 'Gestión de Productos')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">


@endsection

@section('content')
    <div class="admin-table-container">
        <div class="top-bar">
            <h1>Productos</h1>
            <a href="{{ route('admin.productos.create') }}" class="btn-add">+ Nuevo Producto</a>
        </div>

        @if(session('success'))
            <div>
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
                            <form action="{{ route('admin.productos.destroy', $prod->id) }}" method="POST"
                                onsubmit="return confirm('¿Borrar este producto?');">
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

        <div class="back-panel">
            <a href="{{ route('admin.panel') }}">&larr; Volver al Panel</a>
        </div>

    </div>
@endsection