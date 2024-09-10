<?php

// app/Http/Controllers/CardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Crypt;

class CardController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'card_number' => 'required|string|max:20',
            'full_name' => 'required|string|max:255',
            'expiry_date' => 'required|string|max:5',
            'cvv' => 'required|string|max:3',
        ]);

        // Encriptar el CVV
        $encryptedCvv = Crypt::encryptString($validatedData['cvv']);

        // Crear una nueva tarjeta
        Card::create([
            'card_number' => $validatedData['card_number'],
            'full_name' => $validatedData['full_name'],
            'expiry_date' => $validatedData['expiry_date'],
            'cvv' => $encryptedCvv,
        ]);

        return redirect()->back()->with('success', 'Tarjeta guardada exitosamente.');
    }
}
