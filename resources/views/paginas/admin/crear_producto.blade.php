@extends('paginas.app')

@section('title', 'Nuevo Producto')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@endsection

@section('content')
 
<div class="form-container">
    <h1>Nuevo Producto</h1>

    <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- NOMBRE - ocupa toda la fila -->
        <div class="form-group form-group-full">
            <label>Nombre</label>
            <input type="text" name="nombre" maxlength="99" required>
        </div>

        <!-- CATEGORÍA Y ANIMAL - dos columnas -->
        <div class="form-group">
            <label>Categoría</label>
            <select name="categoria">
                <option value="alimentación">Alimentación</option>
                <option value="higiene">Higiene</option>
                <option value="accesorios">Accesorios</option>
                <option value="farmacia">Farmacia</option>
            </select>
        </div>

        <div class="form-group">
            <label>Animal</label>
            <select name="animal_objetivo">
                <option value="perro">Perro</option>
                <option value="gato">Gato</option>
                <option value="ave">Ave</option>
                <option value="roedor">Roedor</option>
                <option value="pez">Pez</option>
                <option value="reptil">Reptil</option>
            </select>
        </div>

        <!-- PRECIO Y STOCK - dos columnas -->
        <div class="form-group">
            <label>Precio (€)</label>
            <input type="number" step="0.01" name="precio" required>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" required>
        </div>

        <!-- IMAGEN - ocupa toda la fila -->
        <div class="form-group form-group-full">
            <label>Imagen</label>
            <div class="input-file-container">
                <input type="file" name="imagen" accept="image/*" required>
                <span class="input-file-label">Seleccionar Imagen</span>
            </div>
        </div>

        <!-- DESCRIPCIÓN - ocupa toda la fila -->
        <div class="form-group form-group-full">
            <label>Descripción</label>
            <textarea name="descripcion" rows="4"></textarea>
        </div>

        <!-- BOTÓN GUARDAR -->
        <button type="submit" class="btn-save">Guardar Producto</button>
    </form>
    
    <a href="{{ route('admin.productos.index') }}">Cancelar</a>
</div>
@endsection