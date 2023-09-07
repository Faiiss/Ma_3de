<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div>
        <?php
        for ($i = 33; $i <= 543; $i++) {
            if ($i % 2 == 0) { //even getallen worden hier in een strong tag gegooid zodat ze dikgedrukt zijn
                echo '<strong>' . $i . '</strong> ';
            } elseif ($i % 5 == 0 && $i % 9 == 0) {
                echo 'Web '; // als cijfer gedeeldt kan worden door 5 en 9 word er web getoond
            } elseif ($i % 5 == 0) {
                echo 'Software '; // als cijfer gedeeldt kan worden door 5 software getoond
            } elseif ($i % 9 == 0) {
                echo 'Developer '; // als cijfer gedeeldt kan worden door 9 developer getoond
            } else {
                echo $i . ' '; // anders word de cijfer normaal getoond 
            }
        }
        ?>
    </div>

</body>

</html>