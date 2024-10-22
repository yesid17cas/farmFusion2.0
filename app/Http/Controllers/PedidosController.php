<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Output;
use App\Models\Product;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index() {
        $pedidos= Output::where('user_doc_id', auth()->id())->with('productsoutput.products')->get();

        return view('pedidos', compact('pedidos'));
    }

    public function show($id) {
         // Cargar el Output junto con los Productsoutput relacionados
         $output = Output::with('user', 'productsoutput.products')->findOrFail($id);

         return view('factura', compact('output'));
    }

    public function ventas() {
        $userId = auth()->id(); // Obtener el ID del usuario autenticado

    // Obtener productos creados por el usuario autenticado que tienen ventas asociadas
    $vendidos = Product::where('user_DocId', $userId)
        ->whereHas('productsoutput') // Verifica que haya ventas asociadas
        ->with('productsoutput')
        ->get();

    return view('ventas', compact('vendidos'));
    }
}
