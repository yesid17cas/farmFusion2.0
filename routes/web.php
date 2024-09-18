<?php

// use Illuminate\Routing\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\CardController;



Route::view('/', 'index')->name('home');
Route::view('/recuperar','olvidoClv')->name('recuperar')->middleware('guest');
Route::view('/info','infoProduc')->name('info');
Route::view('/carrito','carrito')->name('carrito')->middleware('auth');
Route::view('/perfil','verPerfil')->name('verPerfil')->middleware('auth');
Route::view('/datos','Datos')->name('misDatos')->middleware('auth');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store'); 


// INICIO RUTA DE PRODUCTOS


// Ruta para mostrar los productos del usuario autenticado
Route::middleware('auth')->group(function () {
    Route::get('/misProductos', [ProductController::class, 'index'])->name('misProductos'); // Muestra solo los productos del usuario logueado
});

// Ruta para crear productos
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Ruta para gestionar los productos (CRUD completo)
Route::resource('products', ProductController::class)->except(['index']); // Elimina 'index' para evitar conflicto con la ruta '/misProductos'

// Ruta para mostrar el catálogo de productos
Route::get('/catalogo', [ProductController::class, 'catalogo'])->name('catalogo');


// FIN RUTA DE PRODUCTOS



// Ruta de tarjetas
Route::get('/tarjeta', function () {
    return view('tarjeta'); 
})->name('tarjeta')->middleware('auth');

Route::post('/tarjetas', [CardController::class, 'store'])->name('tarjetas.store');
// fin ruta tarjetas




Auth::routes();