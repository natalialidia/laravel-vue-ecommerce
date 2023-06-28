<?php
namespace App\Services;

interface CheckoutMethod {

    public function createCheckoutSession($lineItems);

}