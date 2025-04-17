<?php
// filepath: music-quiz-app/music-quiz-app/src/views/subscription.php

session_start();
require_once '../config/stripe-config.php';
require_once '../controllers/subscription-controller.php';

$subscriptionController = new SubscriptionController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subscriptionResult = $subscriptionController->createSubscription($_POST['email']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Subscription - Music Quiz App</title>
</head>
<body>
    <div class="container">
        <h1>Subscribe for Premium Access</h1>
        <p>Join our premium membership to unlock exclusive content and features!</p>

        <?php if (isset($subscriptionResult)): ?>
            <div class="response">
                <?php echo $subscriptionResult; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <button type="submit">Subscribe</button>
        </form>
    </div>
</body>
</html>