<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', HomeController::class)->name('home');

Route::get('/tienda', [ProductController::class, 'index'])->name('tienda.index');

Route::get('/peluqueria', function () {
    return view('paginas.contenido.peluqueria');
});



Route::get('/talleres', function () {
    return view('paginas.contenido.talleres');
});



Route::get('/galeria', function () {
    return view('paginas.contenido.galeria');
});

Route::get('/contacto', function () {
    return view('paginas.contenido.contacto');
});




Route::get('/carrito', function () {
    return view('paginas.contenido.carrito');
});

Route::get('/autentificacion', function () {
    return view('paginas.contenido.autentificacion.inicio');
});


Route::get('/registro', function () {
    return view('paginas.contenido.autentificacion.registro');
});
