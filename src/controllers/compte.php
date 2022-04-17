<?php
    use app\models\entity\User;
    use app\models\entity\UserStats;

    $titre = "Compte";
    app\app::addRessource("style/compte.less");
    app\app::addRessource("js/compte.js");

    if(isset($_SESSION["user"])){
        $user = $_SESSION["user"];
        UserStats::setTable("user".$user->username);
        $userStats = UserStats::all()[0];
    }else{
        header("Location: connexion");
    }

    require("./views/share/header.php");
    require("./views/compte.php");
    require("./views/share/footer.php");
?>