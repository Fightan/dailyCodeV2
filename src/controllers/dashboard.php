<?php

$titre = "Dashboard";

app\app::addRessource("style/dashboard.less");
app\app::addRessource("js/dashboard.js");

require "../public/views/share/header.php";
require "../public/views/dashboard.php";
require "../public/views/share/footer.php";




?>