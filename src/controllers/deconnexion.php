<?php
    unset($_SESSION["user"]);

    $defaultPage = "accueil";
    if(isset($_GET["p"])){
        $defaultPage = $_GET["p"];
    }

    header("Location: ".$defaultPage);
    die();
?>