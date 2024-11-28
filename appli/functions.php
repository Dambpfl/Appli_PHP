<?php
session_start();

function getTotalProducts() {
    $result = 0;
    if(isset($_SESSION["products"]) || !empty($_SESSION["products"])){
        foreach ($_SESSION["products"] as $index => $product) {
            $result += $product['qtt'];
        }
    }
    return number_format($result);
}
