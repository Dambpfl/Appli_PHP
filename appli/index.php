<?php
    ob_start(); // demarre la temporisation
    require("functions.php"); // recupère les données de 'functions.php'
?>

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
                <?= getTotalProducts() ?> <!-- Utilise une fonction de 'function.php' -->
            </label>
        </p>
    </form>
    
<?php
$title = "Ajouter un produit";
$content = ob_get_clean(); // stock les données de la temporisation dans la variable

require_once "template.php"; ?> <!-- recupere les données de 'template.php' -->