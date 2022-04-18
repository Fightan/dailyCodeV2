<?php
    use app\models\entity\User;

    $titre = "Connexion";
    app\app::addRessource("./assets/style/connexion.less");
    app\app::addRessource("./assets/js/connexion.js");

    //Afficher ou non les erreurs concernant le nom d'utilisateur ou mot de passe (1)
    $visibilityUsername = "hidden";
    $visibilityPassword = "hidden";

    //Par défaut, on affiche l'interface de connexion
    //Sinon on affiche le message "Connexion réussie" (2)
    $connexion = true;

    //Variables pour récupérer les données du formulaire, à afficher dans les input si erreur (3)
    $username = "";
    $password = "";

    //Permet d'identifier la page précédente et y aller après la connexion (4)
    //Ex : utilisateur est sur le forum, il clique sur "Connexion"
    //Après sa connexion il est redirigé vers le forum
    $defaultPage = "accueil";
    if(isset($_GET["p"])){
        $defaultPage = $_GET["p"];
    }
    
    //Si l'utilisateur n'est pas connecté, on l'autorise à se connecter
    if(!isset($_SESSION["user"])){
        if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["p"])){
            $username = $_POST["username"]; //(3)
            $password = $_POST["password"]; //(3)

            $reponse = User::login($_POST["username"]);
            if($reponse == "Utilisateur inconnu"){
                $visibilityUsername = "visible"; //(1)
            }else if($reponse == "Mot de passe incorrect"){
                $visibilityPassword = "visible"; //(1)
            }else{
                $connexion = false; //(2)
                header("refresh:1;url=".$_POST["p"]); //(4)
            }
        }

    //Sinon on le renvoie vers la page d'accueil
    //Ex : si l'utilisateur entre https://dailyCode/connexion dans l'url alors qu'il est connecté, il est redirigé
    }else{
        header("Location: accueil");
    }

    require("./views/share/header.php");
    require("./views/connexion.php");
    require("./views/share/footer.php");
?>