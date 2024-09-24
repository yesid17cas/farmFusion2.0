<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class CarritoController extends Controller
{
    public function agregarAlCarrito(Request $request, $id)
    {
        // Obtener el producto desde la base de datos
        $producto = Product::findOrFail($id);

        // Obtener el carrito de la sesión o un arreglo vacío si no existe
        $carrito = session()->get('carrito', []);

        // Si el producto ya está en el carrito, incrementamos la cantidad
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            // Si no está, lo añadimos con cantidad 1
            $carrito[$id] = [
                'nombre' => $producto->name,
                'precio' => $producto->price,
                'cantidad' => 1,
                'imagen' => $producto->image,
            ];
        }

        // Guardamos el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        // Redirigimos al carrito o a la página actual
        return redirect()->route('carrito.ver')->with('success', 'Producto agregado al carrito');
    }

    // Ver el carrito
    public function verCarrito()
    {
        $carrito = session()->get('carrito', []);

        // Calcular subtotal
        $subtotal = 0;
        foreach ($carrito as $producto) {
            $subtotal += $producto['precio'] * $producto['cantidad'];
        }

        // definir el costo de envío
        $envio = 20;
        $total = $subtotal + $envio;

        return view('carrito', compact('carrito', 'subtotal', 'envio', 'total'));
    }

    // Eliminar una unidad del producto en el carrito
    public function eliminarDelCarrito($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            // Reducir la cantidad en 1
            $carrito[$id]['cantidad']--;

            // Si la cantidad llega a 0, eliminar el producto del carrito
            if ($carrito[$id]['cantidad'] <= 0) {
                unset($carrito[$id]);
            }

            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.ver')->with('success', 'Producto actualizado en el carrito');
    }

}
