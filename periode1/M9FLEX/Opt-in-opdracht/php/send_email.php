<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'config.php';
require 'vendor/autoload.php'; // Load PHPMailer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data (email and token)
    $email = $_POST['email'];
    $token = $_POST['token'];

    // Check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM subscriptions WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Send activation email
        $mail = new PHPMailer(true);

        try {
            // Configure SMTP settings (you may need to adjust these)
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_smtp_username';
            $mail->Password = 'your_smtp_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set the email content
            $mail->setFrom('your_email@example.com', 'Your Name');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Activate Your Subscription';
            $activationLink = "http://yourwebsite.com/activate.php?email=$email&token=$token"; // Replace with your website URL
            $mail->Body = "Click the following link to activate your subscription: <a href=\"$activationLink\">Activate</a>";

            // Send the email
            $mail->send();

            echo json_encode(['message' => 'Activation email sent successfully.']);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Email could not be sent.']);
        }
    } else {
        // Email not found in the database, handle accordingly (e.g., show an error message)
        echo json_encode(['error' => 'Email not found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>
