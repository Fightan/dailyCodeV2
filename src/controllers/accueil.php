<?php

    $titre = "Accueil";
    app\app::addRessource("./assets/style/accueil.less");
    app\app::addRessource("./assets/js/accueil.js");
    require "./views/share/header.php";
    require "./views/accueil.php";
    require "./views/share/footer.php";
