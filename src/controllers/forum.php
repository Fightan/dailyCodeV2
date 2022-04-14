<?php
    use app\app;
    use app\models\entity\SujetEntity;
    use app\models\entity\CategorieEntity;

    $titre = "Forum";
    app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css");
    app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js");
    app::addRessource("style/forum.less");
    app::addRessource("js/forum.js");

    if(isset($_POST["title"]) && isset($_POST["editor"])){
        $sujet = new SujetEntity("randomId".rand(1, 1000), $_POST["title"], $_POST["editor"], "Auteur", "0", "Aujourd'hui");
        // sujet::add($sujet);
        $sujet->add();
    }

    $sujets = SujetEntity::all();
    $categories = CategorieEntity::all();

    require "../public/views/share/header.php";
    require "../public/views/forum.php";
    require "../public/views/share/footer.php";

?>