<?php
    session_start();
    ob_start();

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
                            "<td><a href='traitement.php?action=up-qtt&id=$index' class='btn-up'>+</a></td>",
                            "<td><a href='traitement.php?action=down-qtt&id=$index' class='btn-down'>-</a></td>",
                            "<td><a href='traitement.php?action=delete&id=$index' class='btn-delete'>x</a></td>",
                           
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
                        "<td><a href=traitement.php?action=clear class='btn-clear'>Clear</a></td>",
                        "</tbody>",
                        "</table>";
            }
     ?>

<?php
$title = "Récap des produits";
$content = ob_get_clean();

require_once "template.php"; ?>