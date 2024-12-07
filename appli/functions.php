<?php
session_start(); // permet d'enregistrer en session

function getTotalProducts() {
    $result = 0;
    if(isset($_SESSION["products"]) || !empty($_SESSION["products"])){  // si 'products' existe et n'est pas null
        foreach ($_SESSION["products"] as $index => $product) {
            $result += $product['qtt'];
        }
    }
    return number_format($result);
}
