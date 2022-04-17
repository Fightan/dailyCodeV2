<?php
    use app\models\entity\User;

    $titre = "Inscription";
    app\app::addRessource("style/inscription.less");
    app\app::addRessource("js/inscription.js");

    //Afficher ou non les erreurs concernant le nom d'utilisateur, l'email ou le mot de passe (1)
    $visibilityUsername = "hidden";
    $visibilityEmail = "hidden";
    $visibilityPassword = "hidden";

    //Vérifier si les données saisies par l'utilisateur existent ou non (2)
    //Si elles n'existent pas, on peut créer un nouvel utilisateur
    $isSendable = true;

    //Afficher le formulaire d'inscription si l'utilisateur n'est pas connecté (3)
    $inscription = true;

    //Variables pour récupérer les données du formulaire, à afficher dans les input si erreur (4)
    $username = "";
    $email = "";
    $password ="";

    //Permet d'identifier la page précédente et y aller après la connexion (4)
    //Ex : utilisateur est sur le forum, il clique sur "Connexion"
    //Après sa connexion il est redirigé vers le forum
    $defaultPage = "accueil";
    if(isset($_GET["p"])){
        $defaultPage = $_GET["p"];
    }

    //Si l'utilisateur n'est pas connecté, on l'autorise à s'inscrire
    if(!isset($_SESSION["user"])){
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["p"])){
            $username = $_POST["username"]; //(4)
            $email = $_POST["email"]; //(4)
            $password = $_POST["password"]; //(4)
    
            if(User::select("*", 'username = "'.$username.'"', "") != null){
                $visibilityUsername = "visible"; //(1)
                $isSendable = false; //(2)
            }
            if(User::select("*", 'email = "'.$email.'"', "") != null){
                $visibilityEmail = "visible"; //(1)
                $isSendable = false; //(2)
            }
            if($isSendable){ //(2)
                $user = new User(hash("md5", $username), $username, $email, password_hash($password, PASSWORD_BCRYPT), 2);
                $user->add();
                $_SESSION["user"] = $user;
                $inscription = false; //(3)
                header("refresh:1;url=".$_POST["p"]);
            }
        }
    //Si l'utilisateur est connecté, on le renvoie vers la page d'accueil
    }else{
        header("Location: ".$defaultPage);
    }

    require("./views/share/header.php");
    require("./views/inscription.php");
    require("./views/share/footer.php");
?>