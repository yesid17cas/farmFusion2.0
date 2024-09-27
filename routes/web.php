<?php

// use Illuminate\Routing\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductoControllerB;



Route::view('/', 'index')->name('home');
Route::view('/recuperar','olvidoClv')->name('recuperar')->middleware('guest');
Route::view('/info','infoProduc')->name('info');
Route::view('/tarjeta','tarjeta')->name('tarjeta')->middleware('auth');
Route::view('/carrito','carrito')->name('carrito')->middleware('auth');
Route::view('/perfil','verPerfil')->name('verPerfil')->middleware('auth');
Route::view('/datos','Datos')->name('misDatos')->middleware('auth');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/buscar', [ProductoControllerB::class, 'buscar']); 

Route::get('/catalogo', function () {
    // Obtén todos los productos de la base de datos
    $productos = Product::all();

    // Retorna la vista del catálogo con los productos
    return view('catalogo', ['productos' => $productos]);
})->name('catalogo');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Auth::routes();
