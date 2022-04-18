<?php
    //Afficher les erreurs
    ini_set("display_errors", 1);
    //Fait des require des fichiers .php du dossier /vendor
    require("vendor/autoload.php");
    session_start();

    use app\models\entity\UserStats;
    
    //Déclare un nouveau rooter
    $rooter = new AltoRouter();
    $baseUrl = "/dailyCode";
    
    //Récupère le slug
    $rooter->map("GET", $baseUrl."/", "accueil");
    $rooter->map("GET", $baseUrl."/accueil", "accueil");
    $rooter->map("GET", $baseUrl."/articles", "articles");
    $rooter->map("GET|POST", $baseUrl."/forum", "forum");
    $rooter->map("GET|POST", $baseUrl."/sujet", "sujet");
    $rooter->map("GET", $baseUrl."/contact", "contact");
    $rooter->map("GET", $baseUrl."/compte", "compte");
    $rooter->map("GET|POST", $baseUrl."/connexion", "connexion");
    $rooter->map("GET", $baseUrl."/deconnexion", "deconnexion");
    $rooter->map("GET|POST", $baseUrl."/inscription", "inscription");
    $rooter->map("GET", $baseUrl."/a-propos", "a-propos");
    $rooter->map("GET", $baseUrl."/dashboard", "dashboard");
    $match = $rooter->match();

    //A partir d'ici, tous l'affichage fait à partir de require est stocké dans la mémoire tampon
    ob_start();
    if($match){
        if(is_callable($match["target"])){
            $pageContent = call_user_func_array($match["target"], $match["params"]);
        }else{
            if(isset($_SESSION["user"])){
                UserStats::setTable("user".$_SESSION["user"]->username);
                $userStats = UserStats::all()[0];
                $userStats->setVisitsAllTime($userStats->visitsAllTime+1);
                if($userStats->todayDate !== date("Y-m-d")){
                    $userStats->setTodayDate(date("Y-m-d"));
                    $userStats->setVisitsToday("0");
                }
                $userStats->setVisitsToday($userStats->visitsToday+1);
                $userStats->update("id = ".$userStats->id);
            }

            require "./src/controllers/{$match["target"]}.php";
        }
    }else{
        require "views/404.php";
    }

    $pageContent = ob_get_clean();

    require "views/share/layout.php";
?>

