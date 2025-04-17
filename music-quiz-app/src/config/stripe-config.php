<?php
// Stripe API configuration
require_once 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('your_secret_key_here');

// Optional: Set the webhook secret if you are using webhooks
// $endpoint_secret = 'your_webhook_secret_here';
?>