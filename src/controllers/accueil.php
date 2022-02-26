<?php

    $titre = "Accueil";
    app\app::addRessource("style/accueil.less");
    app\app::addRessource("js/accueil.js");
    require "../public/views/share/header.php";
    require "../public/views/accueil.php";
    require "../public/views/share/footer.php";

?>