<?php
    $titre = "Contact";
    app\app::addRessource("./assets/style/contact.less");
    app\app::addRessource("./assets/js/contact.js"); 
    require "./views/share/header.php";
    require("./views/contact.php");
    require "./views/share/footer.php";
