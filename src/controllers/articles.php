<?php
    $titre = "Articles";
    app\app::addRessource("style/articles.less");
    app\app::addRessource("js/articles.js");
    require("./views/share/header.php");
    require("./views/articles.php");

?>