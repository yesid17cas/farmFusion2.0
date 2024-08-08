<?php

// use Illuminate\Routing\Route;

use Illuminate\Support\Facades\Route;



Route::view('/', 'index')->name('home');
Route::view('/recuperar','olvidoClv')->name('recuperar');
Route::view('/info','infoProduc')->name('info');
Route::view('/tarjeta','tarjeta')->name('tarjeta');
Route::view('/carrito','carrito')->name('carrito');
Route::view('/cata','catalogo')->name('catalogo');





