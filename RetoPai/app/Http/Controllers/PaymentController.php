<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Importar Log para registrar errores
use Inertia\Inertia;
use Stripe\StripeClient;

class PaymentController extends Controller
{
    public function index()
    {
        return Inertia::render('Payment/Index');
    }

    public function getSession()
    {
        $stripe = new StripeClient(env('STRIPE_SECRET')); // Usar la clave secreta

        try {
            $checkoutSession = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'mxn',
                        'unit_amount' => 20000,
                        'product_data' => [
                            'name' => 'T-shirt',
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/dashboard/success',
                'cancel_url' => 'http://localhost:8000/dashboard/cancel',
            ]);

            // Retornar la URL de la sesión de checkout
            return response()->json(['url' => $checkoutSession->url]);

        } catch (\Exception $e) {
            // Registrar el error en los logs
            Log::error('Stripe Checkout Session Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
