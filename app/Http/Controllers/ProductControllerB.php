<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // Para usar el Query Builder si no usas Eloquent

class ProductoControllerB extends Controller
{
    public function buscar(Request $request)
    {
        // Obtener el término de búsqueda
        $query = $request->input('query');

        // Buscar productos en la base de datos que coincidan con el nombre (usando LIKE)
        $productos = DB::table('products') // Asumiendo que tu tabla se llama 'productos'
            ->where('nombre', 'like', '%' . $query . '%')
            ->get();

        // Si no se encontraron productos, devolver un error
        if ($productos->isEmpty()) {
            return response()->json(['error' => 'Producto no disponible']);
        }

        // Devolver los productos en formato JSON
        return response()->json($productos);
    }
}
