<?php
    $titre = "Contact";
    app\app::addRessource("style/contact.less");
    app\app::addRessource("js/contact.js"); 
    require "../public/views/share/header.php";
    require("./views/contact.php");
    require "../public/views/share/footer.php";
