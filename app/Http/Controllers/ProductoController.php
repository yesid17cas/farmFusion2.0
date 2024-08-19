<?php

namespace App\Http\Controllers;

use App\Models\tblproductos;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = tblproductos::all();  // Obtiene todos los productos de la tabla
        // dd($productos);
        return view('catalogo', compact('productos'));  // Envía los productos a la vista
    }
}
