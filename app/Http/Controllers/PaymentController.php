<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_KEY'));
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function showPaymentForm()
    {
        $cards = auth()->user()->cards;
        return view('carrito', compact('cards'));
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentMethod = $request->input('saved_card') ?: $request->input('stripeToken');

        if (!$paymentMethod) {
            return redirect()->back()->with('error', 'Método de pago inválido');
        }

        try {
            $charge = Charge::create([
                'amount' => $request->input('amount'), // Debe ser dinámico
                'currency' => 'usd',
                'description' => 'Compra en tienda',
                'source' => $paymentMethod,
            ]);

            if (!$request->input('saved_card')) {
                $customer = \Stripe\Customer::create([
                    'email' => auth()->user()->email,
                    'source' => $paymentMethod,
                ]);

                $card = $customer->sources->retrieve($customer->default_source);
                Card::create([
                    'user_id' => auth()->id(),
                    'digits' => $card->last4,
                    'token' => $paymentMethod,
                    'expiry_date' => now()->setMonth($card->exp_month)->setYear($card->exp_year),
                ]);
            }

            return redirect()->route('/factura');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function createPaymentIntent()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => 1000,
            'currency' => 'usd',
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }
}
