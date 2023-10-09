<?php
require 'config.php';

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Check if the provided email and token match a record in the database
    $stmt = $pdo->prepare("SELECT * FROM subscriptions WHERE email = ? AND activation_token = ?");
    $stmt->execute([$email, $token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Mark the email as activated in the database
        $stmt = $pdo->prepare("UPDATE subscriptions SET is_activated = 1 WHERE email = ?");
        $stmt->execute([$email]);

        // Provide a success message to the user
        echo "Email address $email has been successfully activated.";
    } else {
        // Invalid email or token
        echo "Invalid activation link.";
    }
} else {
    // Invalid URL parameters
    echo "Invalid activation link.";
}
