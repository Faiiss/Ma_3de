<?php
$host = "db"; // De naam van de database-container in docker-compose.yml
$user = "root";
$pass = "bakkerww_2023"; // Het wachtwoord dat je in docker-compose.yml hebt ingesteld
$db = "bakker_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Databaseverbinding mislukt: " . $conn->connect_error);
}
?>
