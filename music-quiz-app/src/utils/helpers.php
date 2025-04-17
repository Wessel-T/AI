<?php
// This file contains utility functions that assist with various tasks throughout the application.

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function redirectTo($url) {
    header("Location: $url");
    exit();
}

function formatCurrency($amount) {
    return '$' . number_format($amount, 2);
}

function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getCurrentUser() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}
?>