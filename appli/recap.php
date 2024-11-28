<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <button class="btnRecap" onclick="window.location.href = 'index.php'">Page Principal</button>
    <?php
        if(!isset($_SESSION["products"]) || empty($_SESSION["products"])){
            echo "<p>Aucun produit en session...</p>";
        }
        else {            
            echo    "<table border = 1>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                            "</tr>",
                        "</thead>",
                    "<tbody>";
                $totalGeneral = 0;
                $totalQtt = 0;
                foreach($_SESSION["products"] as $index => $product){
                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>", // &nbsp; = ESPACE
                            "<td>".$product['qtt']."</td>",
                            "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",                            
                            "<td><a href=traitement.php?action=up-qtt&id=$index>+</a></td>",
                            "<td><a href=traitement.php?action=down-qtt&id=$index>-</a></td>",
                            "<td><a href=traitement.php?action=delete&id=$index>x</a></td>",
                           
                        "</tr>";
                    $totalGeneral += $product['total'];
                    $totalQtt += $product['qtt'];
                }
                echo    "<tr>",
                            "<td colspan=3>Total quantité : </td>",
                            "<td><strong>".number_format($totalQtt)."</strong></td>",
                        "</tr>";
                echo    "<tr>",
                            "<td colspan=4>Total général : </td>",
                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "</tr>", 
                        "<td><a href=traitement.php?action=clear>clear</a></td>",
                        "</tbody>",
                "</table>";
            }
     ?>
</body>
</html>