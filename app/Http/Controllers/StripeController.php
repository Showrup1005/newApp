<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe');
    }

    public function charge(Request $request)
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        $charge = $stripe->charges->create([
            'amount' => $request['amount'],
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'My First Test Charge (created for API docs)',
        ]);

        // Save transaction details to the database
    // Transaction::create([
    //     'transaction_id' => $charge->id,
    //     'amount' => $charge->amount,
    //     'currency' => $charge->currency,
    //     'description' => $charge->description,
    // ]);

         return back()->with('success', 'Payment has been successfully processed.');
    }
}
