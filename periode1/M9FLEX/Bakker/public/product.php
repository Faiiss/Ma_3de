<?php
include "includes/db.php";

// Haal productgegevens op basis van de id uit de URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM producten WHERE id = $id";
    $result = $conn->query($query);
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['naam']; ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1><?php echo $product['naam']; ?></h1>
    <p><?php echo $product['introtekst']; ?></p>
    <img src="<?php echo $product['afbeelding']; ?>" alt="<?php echo $product['naam']; ?>">
    <h2>Ingrediënten:</h2>
    <p><?php echo $product['ingredienten']; ?></p>
</body>
</html>
