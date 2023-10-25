<?php
include "./includes/db.php";

// Haal productgegevens uit de database
$query = "SELECT * FROM producten";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Producten</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/8a7561e684.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <i class="fa-solid fa-bread-slice"></i>
            <span>Bakker Noord</span>
        </div>
        <ul class="menu">
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <button id="menu-toggle">Menu</button>
    </header>

    <h1>Producten</h1>
    <ul class="brood_list">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li class='brood_list_item'>
            <a href='product.php?id=" . $row['id'] . "'><img src='" . $row['afbeelding'] . "' alt=''></a>
            
            <a href='product.php?id=" . $row['id'] . "'>" . $row['naam'] . "</a>
          </li>";
        }
        ?>
    </ul>
</body>
<script>
    const menuToggle = document.getElementById("menu-toggle");
    const menu = document.querySelector(".menu");

    menuToggle.addEventListener("click", () => {
        menu.classList.toggle("active");
    });
</script>

</html>