<?php
require_once '../src/config/stripe-config.php';
require_once '../src/controllers/payment-controller.php';
require_once '../src/controllers/subscription-controller.php';

session_start();

$paymentController = new PaymentController();
$subscriptionController = new SubscriptionController();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'subscribe':
        $subscriptionController->handleSubscription();
        break;
    case 'payment':
        $paymentController->processPayment();
        break;
    default:
        include '../src/views/album.php';
        include '../src/views/response-bar.php';
        include '../src/views/subscription.php';
        break;
}
?>