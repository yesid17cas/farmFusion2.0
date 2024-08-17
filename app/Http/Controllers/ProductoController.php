<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();  // Obtiene todos los productos de la tabla
        return view('catalogo', compact('productos'));  // Envía los productos a la vista
    }
}
