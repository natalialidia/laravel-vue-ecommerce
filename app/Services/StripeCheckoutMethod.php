<?php
namespace App\Services;

class StripeCheckoutMethod implements CheckoutMethod {

    public function createCheckoutSession($lineItems) {

        \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));

        return  \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.failure', [], true),
        ]);

    }

}