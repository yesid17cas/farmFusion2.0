<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $cards = auth()->user()->cards;
        return view('carrito', compact('cards'));   
    }

    public function processPayment(Request $request)
    {
        
        Stripe::setApiKey('sk_test_51PwuvPBd00zAvLLv7t4MP97BVV0CK8RiH7AEqToRKjl8qmXUEbjlH6FNS075tgFfcsxOu42ExbOKD9tCue5SARAV009VpHGgvK');

        $token = $request->input('stripeToken');

        try {
            $charge = Charge::create([
                'amount' => 1000, // Monto en centavos
                'currency' => 'usd',
                'description' => 'Compra en tienda',
                'source' => $token, // Token de Stripe
            ]);

            // Si usaron una nueva tarjeta, podemos guardar la tarjeta para futuras compras
            if (!$request->input('saved_card')) {
                $customer = \Stripe\Customer::create([
                    'email' => auth()->user()->email,
                    'source' => $token,
                ]);

                // Guardar tarjeta en la base de datos
                $card = $customer->sources->retrieve($customer->default_source);
                Card::create([
                    'user_id' => auth()->id(),
                    'digits' => $card->last4,
                    'token' => $token,
                    'expiry_date' => now()->setMonth($card->exp_month)->setYear($card->exp_year),
                ]);
            }

            return view('factura');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
