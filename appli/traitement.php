<?php
session_start();

if (isset($_POST['submit'])){

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    if($name && $price && $qtt){

        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price*$qtt
        ];

        $_SESSION["products"][] = $product;
    }
}

header("Location:index.php");

if(isset($_GET['action'])){

    switch($_GET['action']){
        case "delete":

            break;
        case "clear":
                unset($_SESSION["products"]);
                header("Location: recap.php"); exit;
            break;

        case "up-qtt":  
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {
                $_SESSION["products"][$_GET["id"]]["qtt"]++;
                }
                header("Location: recap.php"); exit;
            break;

        case "down-qtt": // GET["id"] = URL(recap) && present dans la session(tableau)
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {
                    $_SESSION["products"][$_GET["id"]]["qtt"]--;
                    if($_SESSION["products"][$_GET["id"]]["qtt"] === 0){
                        unset($_SESSION["products"][$_GET["id"]]);
                        header("Location: recap.php"); exit;
                        break;
                    }   
                }
                header("Location: recap.php"); exit;
                break;
    }
}
