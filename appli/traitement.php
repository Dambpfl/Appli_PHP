<?php
session_start(); // permet d'enregistrer en session


if(isset($_GET['action'])){  // si action existe dans l'URL
    
    switch($_GET['action']){
        
        case "add":
            
            if (isset($_POST['submit'])){ // verif si formulaire 'submit'
            
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // filtre dans le nom les caract spéciaux
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // filtre dans le prix le nb à virgule et les "."
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // filtre dans qtt si la valeur est INT
            
                if($name && $price && $qtt){ // si tout valide après filtre
            
                    $product = [ // crée $produit
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
            
                    $_SESSION["products"][] = $product; // ajoute $produit à la session
                }
            }

            $_SESSION["messages"] = "Produit bien ajouté !";
            header("Location: index.php"); exit;
            break;
            
            case "delete": 
                unset($_SESSION["products"][$_GET["id"]]);
                $_SESSION["messages"] = "Produit bien supprimé !";
                header("Location: recap.php"); exit;
            break;

        case "clear":
                unset($_SESSION["products"]);
                header("Location: recap.php"); exit;
            break;

        case "up-qtt":  
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {
                    $_SESSION["products"][$_GET["id"]]["qtt"]++;
                    $_SESSION["products"][$_GET["id"]]["total"] = $_SESSION["products"][$_GET["id"]]["price"] * $_SESSION["products"][$_GET["id"]]["qtt"];
                }
                header("Location: recap.php"); exit;
            break;

        case "down-qtt": // GET["id"] = URL(recap) && present dans la session(tableau)
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {
                    $_SESSION["products"][$_GET["id"]]["qtt"]--;
                    $_SESSION["products"][$_GET["id"]]["total"] = $_SESSION["products"][$_GET["id"]]["price"] * $_SESSION["products"][$_GET["id"]]["qtt"];
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
