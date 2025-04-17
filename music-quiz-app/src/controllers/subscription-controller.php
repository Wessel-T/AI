<?php
// src/controllers/subscription-controller.php

namespace App\Controllers;

use App\Models\User;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription;

class SubscriptionController
{
    public function __construct()
    {
        // Initialize Stripe with your secret key
        Stripe::setApiKey('your_stripe_secret_key');
    }

    public function createSubscription($userId, $paymentMethodId)
    {
        // Retrieve user details
        $user = User::find($userId);

        // Create a new customer in Stripe
        $customer = Customer::create([
            'email' => $user->email,
            'payment_method' => $paymentMethodId,
            'invoice_settings' => [
                'default_payment_method' => $paymentMethodId,
            ],
        ]);

        // Create a subscription for the customer
        $subscription = Subscription::create([
            'customer' => $customer->id,
            'items' => [['price' => 'your_price_id']],
            'expand' => ['latest_invoice.payment_intent'],
        ]);

        return $subscription;
    }

    public function cancelSubscription($subscriptionId)
    {
        // Cancel the subscription
        $subscription = Subscription::retrieve($subscriptionId);
        $subscription->cancel();

        return $subscription;
    }

    public function getSubscriptionStatus($subscriptionId)
    {
        // Retrieve the subscription status
        $subscription = Subscription::retrieve($subscriptionId);
        return $subscription->status;
    }
}
?>