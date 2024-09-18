<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Método para mostrar todos los productos en la vista de misProductos
    public function index()
    {
        // Obtener los productos del usuario autenticado
        $productos = Product::where('user_id', auth()->id())->get();

        // Retornar la vista 'misProductos' con los productos del usuario
        return view('misProductos', compact('productos'));
    }

    // mostrar los productos en catalogo
    public function catalogo()
    {
        $productos = Product::all();

        // Retornar la vista 'catalogo' con la lista de productos
        return view('catalogo', compact('productos'));
    }


    // Método para crear un producto (formulario)
    public function create()
    {
        return view('FormProduc'); // Asegúrate de que esta vista existe en resources/views
    }

    // Método para almacenar un producto
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'descrition' => 'required|string|max:255',
            'price' => 'required|integer',
            'exits' => 'required|integer|min:0',
        ]);

        // Limpiar el campo price
        $price = str_replace(['$', ','], '', $request->input('price'));

        // Obtener el ID del usuario autenticado
        $userId = auth()->id();


        // Crear el producto en la base de datos
        Product::create([
            'name' => $request->input('name'),
            'descrition' => $request->input('descrition'),
            'price' => (int) $price,
            'exits' => $request->input('exits'),
            'user_id' => $userId, // Asignar el ID del usuario autenticado
        ]);

        return redirect()->back()->with('success', 'Producto guardado exitosamente.');
    }

    // Método para editar un producto (formulario)
    public function edit($id)
    {
        // Buscar el producto por su ID
        $producto = Product::findOrFail($id);

        // Retornar la vista de edición con el producto
        return view('editProduct', compact('producto'));
    }

    // Método para actualizar un producto
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'descrition' => 'required|string|max:255',
            'price' => 'required|integer',
            'exits' => 'required|integer|min:0',
        ]);
    
        // Limpiar el campo price
        $price = str_replace(['$', ','], '', $request->input('price'));
    
        // Buscar el producto por su ID y actualizarlo
        $producto = Product::findOrFail($id);
        $producto->update([
            'name' => $request->input('name'),
            'descrition' => $request->input('descrition'),
            'price' => (int) $price,
            'exits' => $request->input('exits'),
        ]);
    
        // Redirigir a la vista de misProductos
        return redirect()->route('misProductos')->with('success', 'Producto actualizado exitosamente.');
    }
    

    // Método para eliminar un producto
    // public function destroy($id)
    // {
    //     // Buscar el producto por su ID y eliminarlo
    //     $producto = Product::findOrFail($id);
    //     $producto->delete();

    //     // Redirigir a la página de listado de productos con un mensaje de éxito
    //     return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    // }
}
