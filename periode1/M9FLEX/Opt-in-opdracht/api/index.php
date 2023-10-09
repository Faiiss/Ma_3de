<?php
require 'config.php';

// Endpoint to handle newsletter subscription
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['newsletterTypes'])) {
    // Validate input data
    $email = $_POST['email'];
    $newsletterTypes = $_POST['newsletterTypes'];

    // Check if the email already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM subscriptions WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        // Email already exists, handle accordingly
        echo json_encode(['error' => 'Email already subscribed.']);
    } else {
        // Generate a unique token for activation (you can use a library like random_bytes)
        $token = bin2hex(random_bytes(32));

        // Insert the subscription data into the database (use prepared statements)
        $stmt = $pdo->prepare("INSERT INTO subscriptions (email, newsletter_types, activation_token) VALUES (?, ?, ?)");
        $stmt->execute([$email, json_encode($newsletterTypes), $token]);

        // Send activation email with the unique link
        $activationLink = "http://yourdomain.com/activate.php?email=$email&token=$token";
        // Implement email sending logic (you can use libraries like PHPMailer)

        echo json_encode(['message' => 'Subscription successful. Check your email to activate.']);
    }
}

// Implement other endpoints (activation, unsubscription, preferences modification) similarly

?>
