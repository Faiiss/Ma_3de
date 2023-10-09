<?php
require 'config.php';
// Get the token from the request headers
$token = $_SERVER['HTTP_AUTH_TOKEN'];

// Check if the token matches the one stored in the database for the user
$stmt = $pdo->prepare("SELECT * FROM subscriptions WHERE email = ? AND auth_token = ?");
$stmt->execute([$email, $token]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    // Unauthorized access, return an error response
    echo json_encode(['error' => 'Unauthorized access.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email address and updated newsletter types
    $email = $_POST['email'];
    $newsletterTypes = $_POST['newsletterTypes'];

    // Check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM subscriptions WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        // Update the newsletter types for the email
        $stmt = $pdo->prepare("UPDATE subscriptions SET newsletter_types = ? WHERE email = ?");
        $stmt->execute([json_encode($newsletterTypes), $email]);

        echo json_encode(['message' => 'Preferences updated successfully.']);
    } else {
        // Email not found in the database, handle accordingly (e.g., show an error message)
        echo json_encode(['error' => 'Email not found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>
