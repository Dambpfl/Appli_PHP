<?php
session_start();

if(!isset($_SESSION["products"]) || empty($_SESSION["products"])){
    echo " ";
}
else {
    function getTotalProducts() {
        $totalQtt = 0;
        foreach ($_SESSION["products"] as $index => $product) {
                $totalQtt += $product['qtt'];
        }
        return number_format($totalQtt);
    }

}           