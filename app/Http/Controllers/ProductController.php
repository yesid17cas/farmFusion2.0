<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'descrition' => 'required|string|max:255',
            'price' => 'required|integer',
            'exits' => 'required|integer|min:0',
            // 'user_id' ya no es obligatorio
        ]);
        
        // Limpiar el campo price
        $price = str_replace(['$', ','], '', $request->input('price'));
        
        // Crear el producto en la base de datos
        Product::create([
            'name' => $request->input('name'),
            'descrition' => $request->input('descrition'),
            'price' => (int) $price,
            'exits' => $request->input('exits'),
            // 'user_id' ya no se asigna
        ]);

        return redirect()->back()->with('success', 'Producto guardado exitosamente.');
    }
    public function create()
    {
        return view('FormProduc'); // Asegúrate de que esta vista existe en resources/views
    }
}


