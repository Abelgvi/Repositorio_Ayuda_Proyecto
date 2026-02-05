<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



//RUTAS PARA DE APPBLADE ///////////////////////////////////////////////////////
Route::get('/', HomeController::class)->name('home');

Route::get('/tienda', [ProductController::class, 'index'])->name('tienda.index');

/////////////////////////////////////////////////////////////////////////////////


//RUTAS PARA EL LOGEO Y REGISTRO DE SESION/////////////////////////////////////////////////////////////
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro.submit');
////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Grupo de rutas para ADMINISTRADORES/////////////////////////////////////////////////////////////////


//Panel Principal
Route::get('/admin/panel', [AdminController::class, 'index'])
    ->middleware('auth') // Asegura que esté logueado
    ->name('admin.panel');

//Panel de productos
Route::resource('/admin/productos', AdminProductController::class)->names('admin.productos');






////////////////////////////////////////////////////////////////////////////////////////////////////////

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
