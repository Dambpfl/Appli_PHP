<?php
    session_start(); // permet d'enregistrer en session
    ob_start(); // demarre la temporisation

        if(!isset($_SESSION["products"]) || empty($_SESSION["products"])){ // VERIF SI PRODUCTS EXISTE ET SI VIDE
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
                            "<td>".$index."</td>", // l'id du tableau
                            "<td>".$product['name']."</td>", // le produit
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>", // le prix avec 2 décimal et ',' comme séparateur
                            "<td>".$product['qtt']."</td>", // la quantité
                            "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>", // le total avec 2 décimal et ',' comme séparateur                        
                            "<td><a href='traitement.php?action=up-qtt&id=$index' class='btn-up'>+</a></td>", // crée un lien pour augmenter la quantité par l'id (btn +)
                            "<td><a href='traitement.php?action=down-qtt&id=$index' class='btn-down'>-</a></td>", // lien diminuer la quantité (btn -)
                            "<td><a href='traitement.php?action=delete&id=$index' class='btn-delete'>x</a></td>", // lien supprimer le produit (btn x)
                           
                        "</tr>";
                    $totalGeneral += $product['total']; // additione chaque 'total' de produit dans $totalGeneral
                    $totalQtt += $product['qtt']; // additione chaque 'qtt' de produit dans $totalQtt
                }
                echo    "<tr>",
                            "<td colspan=3>Total quantité : </td>",
                            "<td><strong>".number_format($totalQtt)."</strong></td>", // affiche le total quantité
                        "</tr>";
                echo    "<tr>",
                            "<td colspan=4>Total général : </td>",
                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>", // affiche le total general
                        "</tr>", 
                        "<td><a href=traitement.php?action=clear class='btn-clear'>Clear</a></td>", // lien pour clear tout le tableau (btn clear)
                        "</tbody>",
                        "</table>";
            }
     ?>

<?php
$message = "Vous avez supprimez un produit";
$title = "Récap des produits";
$content = ob_get_clean(); // stock les données de la temporisation dans la variable

require_once "template.php"; ?> <!-- recupere les données de 'template.php' -->