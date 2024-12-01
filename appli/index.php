<?php
    require("functions.php");
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <button class="btnIndex" onclick="window.location.href = 'recap.php'">Recap</button>
    <form action="traitement.php?action=add" method="post">
        <p>
            <label>
                Nom du produit :
                <input type="text" name="name" require>
            </label>
        </p>
        <p>
            <label>
                Prix du produit :
                <input type="number" step="any" name="price">
            </label>
        </p>
        <p>
            <label>
                Quantité désirée :
                <input type="number" name="qtt" value="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
        <p>
            <label>
                Quantité total :
                <?= getTotalProducts() ?>
            </label>
        </p>
    </form>
    
</body>
</html>

<?php
$content = ob_get_clean();

require_once "template.php"; ?>