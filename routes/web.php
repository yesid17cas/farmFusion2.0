<?php

// use Illuminate\Routing\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;

Route::view('/', 'index')->name('home');

// Ruta para mostrar los productos del usuario autenticado
Route::middleware('auth')->group(function () {
    // Ruta para configuraciones perfil
    Route::view('/config', 'config')->name('config');

    // Ruta para ver informacion perfil
    Route::get('/datos', [UsuarioController::class, 'show'])->name('misDatos');

    // INICIO RUTA DE PRODUCTOS

    // Productos creados usuario
    Route::get('/misProductos', [ProductController::class, 'index'])->name('misProductos'); // Muestra solo los productos del usuario logueado

    // Ruta para gestionar los productos (CRUD completo)
    Route::resource('products', ProductController::class)->except(['index','destroy']); // Elimina 'index' para evitar conflicto con la ruta '/misProductos'

    // Ruta para mostrar el catálogo de productos
    Route::get('/catalogo', [ProductController::class, 'catalogo'])->name('catalogo');

    // FIN RUTA DE PRODUCTOS


    // RUTA DE TARJETAS

    // Ruta Mostrar tarjetas
    Route::get('/tarjeta', [CardController::class, 'show'])->name('tarjeta');

    // Ruta crear tarjeta
    Route::post('/tarjeta/store', [CardController::class, 'savePaymentMethod'])->name('tarjetas.store');

    // Ruta eliminar tarjeta
    Route::delete('/tarjeta/eliminar/{id}', [CardController::class, 'delete'])->name('tarjeta.eliminar');

    // FIN RUTA DE TARJETAS


    // RUTA PAGOS

    // Ruta pago tarjeta guardada
    Route::post('/payment/save', [PaymentController::class, 'processPayment'])->name('payment.process');

    // Ruta pago tarjeta nueva
    Route::get('/payment/intent', [PaymentController::class, 'createPaymentIntent']);

    // Lista de compras
    Route::get('/compras', [PedidosController::class, 'index'])->name('compras');

    // facturas
    Route::get('/pedidos/{id}', [PedidosController::class, 'show'])->name('pedidos.show');

    // FIN RUTA PAGOS


    // RUTAS CARRITO

    // Ruta agregar productos carrito
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');

    // Ruta ver carrito
    Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');

    // Ruta eliminar producto carrito
    Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');

    // Ruta actualizar carrito
    Route::patch('/carrito/{id}/actualizar', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');

    // Ruta pago carrito
    Route::get('/eliminar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

    // FIN RUTAS CARRITO

    // Ruta para bajas
    Route::post('/bajas', [ProductController::class, 'bajas'])->name('bajas');
    
    // Ruta para entradas
    Route::post('/entradas', [ProductController::class, 'entradas'])->name('entradas');
});

// Ruta inicio de sesion
Auth::routes([
    'register' => false,
    'confirm' => false,
]);
