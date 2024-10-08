<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_KEY'));
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }


    public function processPayment(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => 2000, // Monto en centavos, por ejemplo, 20.00 USD
                'currency' => 'usd',
                'payment_method' => $request->payment_method, // Token de la tarjeta guardado o ID del método de pago
                'customer' => User::where('DocID', auth()->id())->value('stripe_customer_id'),
                'confirm' => true,
                'return_url' => route('factura'),
            ]);

            return response()->json([
                'success' => true,
                'paymentIntent' => $paymentIntent
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
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
