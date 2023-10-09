<?php
// subscribe.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get input data
  $requestData = json_decode(file_get_contents('php://input'), true);
  $email = $requestData['email'];
  $subscriptions = $requestData['subscriptions'];

  // Validate and sanitize input data (implement validation as needed)

  // Insert data into the database using prepared statement
  $mysqli = new mysqli('localhost', 'username', 'password', 'database_name');
  if ($mysqli->connect_error) {
    die('Connection Error: ' . $mysqli->connect_error);
  }
  
  // Prepare the SQL statement
  $stmt = $mysqli->prepare('INSERT INTO subscriptions (email, type1, type2) VALUES (?, ?, ?)');
  if (!$stmt) {
    die('Prepare Error: ' . $mysqli->error);
  }
  
  // Bind parameters and execute
  $stmt->bind_param('sss', $email, $type1, $type2);
  $type1 = in_array('type1', $subscriptions) ? 1 : 0;
  $type2 = in_array('type2', $subscriptions) ? 1 : 0;
  $stmt->execute();

  // Check for success and send response
  if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'message' => 'Subscription failed']);
  }

  // Close statement and database connection
  $stmt->close();
  $mysqli->close();
} else {
  http_response_code(405); // Method Not Allowed
  echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
