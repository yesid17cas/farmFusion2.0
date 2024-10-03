<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\User;
use Stripe\Stripe;
use Stripe\PaymentMethod;
use Exception;
use Illuminate\Support\Facades\Log;

class CardController extends Controller
{
    public function savePaymentMethod(Request $request)
    {
        try {
            // Establecer la clave de API de Stripe desde la configuración de servicios
            Stripe::setApiKey(config('services.stripe.secret'));

            // Validar que el Payment Method ID se ha enviado
            $request->validate([
                'payment_method_id' => 'required|string',
            ]);

            // Obtener el usuario autenticado
            $user = auth()->user();

            // Inicializar el cliente de Stripe
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            // Verificar si el usuario ya tiene un cliente en Stripe
            if (!$user->stripe_customer_id) {
                // Crear un nuevo cliente de Stripe
                $customer = \Stripe\Customer::create([
                    'email' => $user->email,
                ]);

                // Guardar el ID del cliente de Stripe en la base de datos
                $user->stripe_customer_id = $customer->id;
                $user->save();
            }

            // Asociar el método de pago al cliente de Stripe
            $stripe->paymentMethods->attach(
                $request->payment_method_id,
                ['customer' => $user->stripe_customer_id]
            );

            // Recuperar los detalles del método de pago para guardarlos en la base de datos
            $paymentMethod = PaymentMethod::retrieve($request->payment_method_id);

            // Guardar los detalles de la tarjeta en la base de datos
            Card::create([
                'token' => $paymentMethod->id, // ID del método de pago
                'branch' => $paymentMethod->card->brand,
                'name' => $paymentMethod->billing_details->name,
                'digits' => $paymentMethod->card->last4, // Últimos 4 dígitos de la tarjeta
                'expiry_date' => $paymentMethod->card->exp_month . '/' . $paymentMethod->card->exp_year, // Fecha de caducidad
                'user_DocId' => $user->DocId, // ID del usuario en tu base de datos
            ]);


            // Responder con éxito
            return response()->json(['success' => true, 'message' => 'Tarjeta guardada correctamente']);
        } catch (Exception $e) {
            // Manejo de errores
            Log::error('Error al guardar el método de pago: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error interno del servidor'], 500);
        }
    }

    public function show(){
        $cards = Card::where('user_DocID', auth()->id())->get();

        return view('tarjeta', compact('cards'));
    }

    public function delete($id){
        $card=Card::find($id);

        if ($card) {
            $card->delete();
            return redirect()->route('tarjeta');
        } else {
            return response()->json(['error' => 'Registro no encontrado']);
        }
    }
}
