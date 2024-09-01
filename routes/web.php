<?php

// use Illuminate\Routing\Route;
use App\Http\Controllers\ProductoController;


use Illuminate\Support\Facades\Route;



Route::view('/', 'index')->name('home');
Route::view('/recuperar','olvidoClv')->name('recuperar');
Route::view('/info','infoProduc')->name('info');
Route::view('/tarjeta','tarjeta')->name('tarjeta');
Route::view('/carrito','carrito')->name('carrito');
// Route::get('/catalogo', [ProductoController::class, 'index']);
Route::view('/catalogo','catalogo');
Route::view('/perfil','verPerfil')->name('verPerfil');
Route::view('/datos','Datos')->name('misDatos');
// Route::get('/catalogo', [ProductoController::class, 'index']);

Auth::routes();