<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CajasCartonController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;

// LISTAR productos
Route::get('/productos', [ProductoController::class, 'index']);

// VER producto individual
Route::get('/productos/{id}', [ProductoController::class, 'show']);

// CREAR producto (Postman)
Route::post('/productos', [ProductoController::class, 'store']);

// ACTUALIZAR producto
Route::put('/productos/{id}', [ProductoController::class, 'update']);

// ELIMINAR producto
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

// CAMBIAR estado
Route::patch('/productos/{id}/estado', [ProductoController::class, 'toggleEstado']);



// RUTA DEL INICIO
Route::get('/', [CatalogoController::class, 'index'])->name('welcome');

// ruta para el metodo de enviar correos del formulario contact con el controller
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');


// RUTAS PARA CADA VISTA DE MIS BLADE


// rutas para contacto blade
Route::get('/contacto', function () {return view('contacto');})->name('contacto');



Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');

//Ruta para contenido
Route::get('/contenido-video', [CatalogoController::class, 'contenidoVideo'])->name('contenido.video');
Route::get('/contenido-fotografia', [CatalogoController::class, 'contenidoFotografia'])->name('contenido.fotografia');

Route::get('/marketing/facebook-ads', [CatalogoController::class, 'marketingFacebookAds'])->name('marketing.facebookads');
Route::get('/marketing/gestion-redes', [CatalogoController::class, 'marketingGestionRedes'])->name('marketing.gestionredes');

Route::get('/branding/identidad-visual', [CatalogoController::class, 'brandingIdentidad'])->name('identidad.visual');

Route::get('/novedades', [CatalogoController::class, 'novedades'])->name('novedades');
Route::get('/ofertas', [CatalogoController::class, 'ofertas'])->name('novedades.ofertas');
Route::get('/mas-vendidos', [CatalogoController::class, 'vendidos'])->name('novedades.vendidos');

Route::get('/categoria/autoayuda', [CatalogoController::class, 'autoayuda'])->name('categoria.autoayuda');
Route::get('/categoria/ciencia', [CatalogoController::class, 'ciencia'])->name('categoria.ciencia');
Route::get('/categoria/educacion', [CatalogoController::class, 'educacion'])->name('categoria.educacion');
Route::get('/categoria/infantil', [CatalogoController::class, 'infantil'])->name('categoria.infantil');
Route::get('/categoria/literatura', [CatalogoController::class, 'literatura'])->name('categoria.literatura');
Route::get('/categoria/novela', [CatalogoController::class, 'novela'])->name('categoria.novela');
Route::get('/categoria/tecnologia', [CatalogoController::class, 'tecnologia'])->name('categoria.tecnologia');

//login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
require __DIR__.'/auth.php';


Route::get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');
