<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <div id="wrapper">
        <h1><?= $title ?></h1> <!-- Ajoute le titre -->

        <?php
            if(isset($_SESSION["messages"])) { // verif si 'message'
                echo $_SESSION["messages"]; // affiche
                unset($_SESSION["messages"]); // supprime
            }
        ?>
        <nav>
            <a href="index.php" class="btnRecap">Menu principal</a>
            <a href="recap.php" class="btnIndex">Panier</a>  
        </nav>
        <?= $content ?>   <!-- contenue en temporisation -->
    </div>
</body>
</html>