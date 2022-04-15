<?php
    use app\models\entity\User;

    $titre = "Connexion";
    app\app::addRessource("style/connexion.less");
    app\app::addRessource("js/connexion.js");

    $visibilityUsername = "hidden";
    $visibilityPassword = "hidden";

    $connexion = "display: flex";
    $connexionReussie = "display: none";

    $username = "";
    $password = "";

    $defaultPage = "accueil";
    if(isset($_GET["p"])){
        $defaultPage = $_GET["p"];
    }

    
    if(!isset($_SESSION["user"])){
        if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["p"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $reponse = User::login($_POST["username"]);
            if($reponse == "Utilisateur inconnu"){
                $visibilityUsername = "visible";
            }else if($reponse == "Mot de passe incorrect"){
                $visibilityPassword = "visible";
            }else{
                $connexion = "display: none";
                $connexionReussie = "display: flex";
                header("refresh:1;url=".$_POST["p"]);
            }
        }
    }else{
        header("Location: accueil");
    }

    require("./views/share/header.php");
    require("./views/connexion.php");
    require("./views/share/footer.php");
?>