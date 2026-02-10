<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;    
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CitaController;


/////////////////////////////////////////////////RUTAS PARA DE APPBLADE /////////////////////////////////////////////////////////////////////
Route::get('/', HomeController::class)->name('home');

Route::get('/tienda', [ProductController::class, 'index'])->name('tienda.index');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////RUTAS PARA EL LOGEO Y REGISTRO DE SESION////////////////////////////////////////////////////////
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro.submit');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////// GRUPO DE RUTAS PARA ADMINISTRADORES/////////////////////////////////////////////////////////////////


//Panel Principal
Route::get('/admin/panel', [AdminController::class, 'index'])
    ->middleware('auth') // Asegura que esté logueado
    ->name('admin.panel');



//Panel de productos
Route::resource('/admin/productos', AdminProductController::class)->names('admin.productos');

//Panel Citas

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/citas', [AdminController::class, 'citas'])->name('admin.citas');
    Route::post('/admin/citas/{id}/estado', [CitaController::class, 'updateStatus'])->name('admin.citas.update');
});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////// RUTAS DEL CARRITO//////////////////////////////////////////////////////////////////////////////////////
Route::get('/carrito', [CartController::class, 'index'])->name('carrito.index');
Route::post('/carrito/add', [CartController::class, 'add'])->name('carrito.add');
Route::get('/carrito/remove/{id}', [CartController::class, 'remove'])->name('carrito.remove');
Route::get('/carrito/clear', [CartController::class, 'clear'])->name('carrito.clear');
////////////////////////////////////////////////////////////////////////////////////////////////////////////








// Ruta para la página principal de talleres/////////////////////////////////////////////////////////////////////////////////////
Route::get('/talleres', function () {
    return view('paginas.contenido.talleres');
})->name('talleres.index');

// Ruta para el detalle del taller de navidad
Route::get('/talleres/navidad', function () {
    return view('paginas.contenido.talleres_navidad');
})->name('talleres.navidad');

Route::get('/galeria', function () {
    return view('paginas.contenido.galeria');
});

Route::get('/contacto', function () {
    return view('paginas.contenido.contacto');
});


//////////////////////////////////////////////////////RUTAS DEL CLIENTE//////////////////////////////////////////////////////////////////////////////////////
Route::middleware('auth')->group(function () {

    // Perfil principal - Ajustado a la carpeta paginas.users
    Route::get('/perfil', [ProfileController::class, 'show'])->name('perfil.show')->middleware('auth');

    // Contraseña
    Route::get('/password/edit', [ProfileController::class, 'editPassword'])->name('password.edit');
    Route::post('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Favoritos
    Route::get('/favoritos', [ProfileController::class, 'favoritos'])->name('favoritos.index');

    Route::get('/perfil/crear-mascota', [ProfileController::class, 'createAnimal'])->name('animal.create');
    Route::post('/perfil/crear-mascota', [ProfileController::class, 'storeAnimal'])->name('animal.store');
});

/////////////////////////////////////////////////////PELUQUERIA/////////////////////////////////////////////////////////////////////////////////////////

Route::middleware(['auth'])->group(function () {
    Route::post('/peluqueria/reservar', [CitaController::class, 'store'])->name('citas.store');
    Route::get('/admin/citas', [AdminController::class, 'citas'])->name('admin.citas');
    Route::post('/admin/citas/{id}/estado', [CitaController::class, 'updateStatus'])->name('admin.citas.update');
});

Route::get('/peluqueria', [CitaController::class, 'index'])->name('peluqueria');
