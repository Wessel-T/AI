<?php

require_once __DIR__ . '/../config/stripe-config.php';

class PaymentController {
    private $stripe;

    public function __construct() {
        $this->stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
    }

    public function createPaymentIntent($amount, $currency = 'usd') {
        try {
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => $amount,
                'currency' => $currency,
                'payment_method_types' => ['card'],
            ]);
            return $paymentIntent;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function confirmPayment($paymentIntentId) {
        try {
            $paymentIntent = $this->stripe->paymentIntents->confirm($paymentIntentId);
            return $paymentIntent;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}