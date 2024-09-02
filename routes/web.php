<?php

// use Illuminate\Routing\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;



Route::view('/', 'index')->name('home');
Route::view('/recuperar','olvidoClv')->name('recuperar');
Route::view('/info','infoProduc')->name('info');
Route::view('/tarjeta','tarjeta')->name('tarjeta');
Route::view('/carrito','carrito')->name('carrito');
// Route::get('/catalogo', [ProductoController::class, 'index']);
Route::view('/catalogo','catalogo');
Route::view('/perfil','verPerfil')->name('verPerfil');
Route::view('/datos','Datos')->name('misDatos');


Route::post('/products/store', [ProductController::class, 'store'])->name('products.store'); 

Route::get('/catalogo', function () {
    // Obtén todos los productos de la base de datos
    $productos = Product::all();

    // Retorna la vista del catálogo con los productos
    return view('catalogo', ['productos' => $productos]);
});
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');


Auth::routes();