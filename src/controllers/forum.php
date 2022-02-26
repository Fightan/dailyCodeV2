<?php
    $titre = "Forum";
    app\app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css");
    app\app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js");
    app\app::addRessource("style/forum.less");
    app\app::addRessource("js/forum.js");

    require "../public/views/share/header.php";
    require "../public/views/forum.php";
    require "../public/views/share/footer.php";

?>