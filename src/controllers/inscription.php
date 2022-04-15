<?php
    use app\models\entity\User;

    $titre = "Inscription";
    app\app::addRessource("style/inscription.less");
    app\app::addRessource("js/inscription.js");

    $visibilityUsername = "hidden";
    $visibilityEmail = "hidden";
    $visibilityPassword = "hidden";
    $isSendable = true;
    $inscription = "display: flex";
    $inscriptionReussie = "display: none";

    $username = "";
    $email = "";

    $defaultPage = "accueil";
    if(isset($_GET["p"])){
        $defaultPage = $_GET["p"];
    }

    if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["p"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(User::selectWhere("*", 'username = "'.$username.'"', "") != null){
            $visibilityUsername = "visible";
            $isSendable = false;
        }
        if(User::selectWhere("*", 'email = "'.$email.'"', "") != null){
            $visibilityEmail = "visible";
            $isSendable = false;
        }
        if($isSendable){
            $user = new User(hash("md5", $username), $username, $email, password_hash($password, PASSWORD_BCRYPT), 2);
            $user->add();
            $_SESSION["user"] = $user;
            $inscription = "display: none";
            $inscriptionReussie = "display: flex";
            header("refresh:1;url=".$_POST["p"]);
        }
    }



    require("./views/share/header.php");
    require("./views/inscription.php");
    require("./views/share/footer.php");
?>