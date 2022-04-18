<?php
    $titre = "A propos";
    app\app::addRessource("./assets/style/a-propos.less");
    app\app::addRessource("./assets/js/a-propos.js");
    require "./views/share/header.php";
    require("./views/a-propos.php");
    require "./views/share/footer.php";

?>