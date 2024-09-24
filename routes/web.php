<?php

// use Illuminate\Routing\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PaymentController;

Route::view('/', 'index')->name('home');
Route::view('/info','infoProduc')->name('info');
Route::view('/carrito','carrito')->name('carrito')->middleware('auth');
Route::view('/perfil','verPerfil')->name('verPerfil')->middleware('auth');
Route::view('/datos','Datos')->name('misDatos')->middleware('auth');
Route::view('/tarjeta','tarjeta')->name('tarjeta')->middleware('auth');
Route::view('/factura','factura')->middleware('auth');

Route::post('/products/store', [ProductController::class, 'store'])->name('products.store'); 
Route::post('/tarjetas', [CardController::class, 'store'])->name('tarjetas.store');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');

Route::get('/catalogo', function () {
    // Obtén todos los productos de la base de datos
    $productos = Product::all();
    // Retorna la vista del catálogo con los productos
    return view('catalogo', ['productos' => $productos]);
})->name('catalogo');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/payment/form', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::get('/payment/intent', [PaymentController::class, 'createPaymentIntent']);


Auth::routes();

Route::view('/mail','emails.custom-reset-password');