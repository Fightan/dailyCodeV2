<?php
    //Afficher les erreurs
    ini_set("display_errors", 1);
    //Fait des require des fichiers .php du dossier /vendor
    require("../vendor/autoload.php");
    session_start();
    
    //Déclare un nouveau rooter
    $rooter = new AltoRouter();
    
    //Récupère le slug
    $rooter->map("GET", "/", "accueil");
    $rooter->map("GET", "/accueil", "accueil");
    $rooter->map("GET", "/articles", "articles");
    $rooter->map("GET", "/forum", "forum");
    $rooter->map("POST", "/forum", "forum");
    $rooter->map("GET", "/contact", "contact");
    $rooter->map("GET", "/compte", "compte");
    $rooter->map("GET", "/connexion", "connexion");
    $rooter->map("POST", "/connexion", "connexion");
    $rooter->map("GET", "/deconnexion", "deconnexion");
    $rooter->map("GET", "/inscription", "inscription");
    $rooter->map("POST", "/inscription", "inscription");
    $rooter->map("GET", "/a-propos", "a-propos");
    $rooter->map("GET", "/dashboard", "dashboard");
    $rooter->map("GET", "/forum?m=[*]", "message");
    $match = $rooter->match();

    //A partir d'ici, tous l'affichage fait à partir de require est stocké dans la mémoire tampon
    ob_start();
    if($match){
        if(is_callable($match["target"])){
            $pageContent = call_user_func_array($match["target"], $match["params"]);
        }else{
            require "../src/controllers/{$match["target"]}.php";
        }
    }else{
        require "views/404.php";
    }

    $pageContent = ob_get_clean();

    require "views/share/layout.php";
?>

