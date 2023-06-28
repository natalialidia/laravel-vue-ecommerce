<?php

namespace App\Services;

class CheckoutFactory {

    public static function getCheckoutMethod(string $id): CheckoutMethod {
        switch ($id) {
            case "stripe":
                return new StripeCheckoutMethod();
            default:
                throw new \Exception("Unknown Checkout Method");
        }
    }

}