<?php
    $titre = "A propos";
    app\app::addRessource("style/a-propos.less");
    app\app::addRessource("js/a-propos.js");
    require "../public/views/share/header.php";
    require("./views/a-propos.php");
    require "../public/views/share/footer.php";
