@extends('paginas.app')

@section('title', 'Nuevo Producto')

@section('css')
<style>
    .form-container { max-width: 800px; margin: 40px auto; padding: 30px; background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    .form-group { margin-bottom: 20px; }
    label { display: block; margin-bottom: 8px; font-weight: bold; color: #2c3e50; }
    input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
    .btn-save { background: #27ae60; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem; }
</style>
@endsection

@section('content')
<div class="form-container">
    <h1>Nuevo Producto</h1>
    
    {{-- IMPORTANTE: enctype para subir archivos --}}
    <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" maxlength="99" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
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
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label>Precio (€)</label>
                <input type="number" step="0.01" name="precio" required>
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock" required>
            </div>
        </div>

        <div class="form-group">
            <label>Imagen (Se guardará en Base64)</label>
            <input type="file" name="imagen" accept="image/*" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" rows="4"></textarea>
        </div>

        <button type="submit" class="btn-save">Guardar Producto</button>
        <a href="{{ route('admin.productos.index') }}" style="margin-left: 15px; color: gray;">Cancelar</a>
    </form>
</div>
@endsection