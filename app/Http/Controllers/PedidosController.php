<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Output;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index() {
        $pedidos= Output::where('user_DocId', auth()->id())->with('productsoutput.products')->get();

        return view('pedidos', compact('pedidos'));
    }

    public function show($id) {
         // Cargar el Output junto con los Productsoutput relacionados
         $output = Output::with('user', 'productsoutput.products')->findOrFail($id);

         return view('factura', compact('output'));
    }
}
