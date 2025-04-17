<?php
// filepath: music-quiz-app/music-quiz-app/src/views/album.php

session_start();
require_once '../config/stripe-config.php';

$albumImage = 'path/to/album/image.jpg'; // Replace with the actual path to the album image
$albumTitle = 'Music Quiz Album';
$description = 'Test your music knowledge with our fun and engaging quiz!';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title><?php echo $albumTitle; ?></title>
</head>
<body>
    <div class="album-container">
        <h1><?php echo $albumTitle; ?></h1>
        <img src="<?php echo $albumImage; ?>" alt="Album Image" class="album-image">
        <p><?php echo $description; ?></p>
        
        <div class="subscription-info">
            <h2>Premium Subscription</h2>
            <p>Subscribe to access premium content and features!</p>
            <a href="/src/views/subscription.php" class="subscribe-button">Subscribe Now</a>
        </div>
    </div>

    <script src="/js/scripts.js"></script>
</body>
</html>