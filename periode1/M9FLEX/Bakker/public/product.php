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
    <script src="https://kit.fontawesome.com/8a7561e684.js" crossorigin="anonymous"></script>
</head>
<header class="header">
    <div class="logo">
        <i class="fa-solid fa-bread-slice"></i>
        <span>Bakker Noord</span>
    </div>
    <ul class="menu">
        <li><a href="./index.php">Producten</a></li>
        <li><a href="#">Over ons</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    <button id="menu-toggle">Menu</button>
</header>

<body>
    <section class="product_brood_details">
        <article class="product_brood_details_text">
            <div class="product_brood_details_text_intro">
                <h1><?php echo $product['naam']; ?></h1>
                <p><?php echo $product['introtekst']; ?></p>
            </div>
            <div class="product_brood_details_text_ing">
                <h2>Ingrediënten:</h2>
                <p><?php echo $product['ingredienten']; ?></p>
            </div>

        </article>
        <div class="product_brood_image">
            <svg class="brood_blob" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#d7253d" d="M53.1,-66.7C63.4,-54.6,62.6,-32.8,61.7,-14.3C60.9,4.1,60,19.1,53.4,31.1C46.8,43.1,34.5,52,19.3,61.1C4,70.2,-14.1,79.4,-32.2,77.5C-50.3,75.7,-68.3,62.8,-78.4,45.3C-88.6,27.8,-90.8,5.7,-87.1,-15.4C-83.4,-36.4,-73.7,-56.3,-58.2,-67.5C-42.7,-78.7,-21.3,-81.2,0,-81.2C21.4,-81.2,42.8,-78.9,53.1,-66.7Z" transform="translate(100 100)" />
            </svg>
            <img class="product_brood_img" src="<?php echo $product['afbeelding']; ?>" alt="<?php echo $product['naam']; ?>">
        </div>


    </section>

</body>

</html>