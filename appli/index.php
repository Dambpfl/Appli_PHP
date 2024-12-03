<?php
    ob_start();
    require("functions.php");
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
                <?= getTotalProducts() ?>
            </label>
        </p>
    </form>
    
<?php
$title = "Ajouter un produit";
$content = ob_get_clean();

require_once "template.php"; ?>