<?php

$titre = "Dashboard";

app\app::addRessource("./assets/style/dashboard.less");
app\app::addRessource("./assets/js/dashboard.js");

require "./views/share/header.php";
require "./views/dashboard.php";
require "./views/share/footer.php";




?>