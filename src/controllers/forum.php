<?php
    use app\app;
    use app\models\entity\Sujet;
    use app\models\entity\Categorie;
    use app\models\entity\User;

    $titre = "Forum";
    app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css");
    app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js");
    app::addRessource("style/forum.less");
    app::addRessource("js/forum.js");

    $nouveauSujet = "display: none";
    $connect = "display: flex";
    $user = "";
    if(isset($_SESSION["user"])){
        $user = $_SESSION["user"];
        $nouveauSujet = "display: flex";
        $connect = "display: none";
    }

    date_default_timezone_set("Europe/Paris");
    if(isset($_POST["delete"])){
        $sujet = sujet::select("*", 'id_sujet = "'.$_POST["delete"].'"', "")[0];
        if($sujet->auteur === $_SESSION["user"]->username){
            $sujet->delete('id_sujet = "'.$_POST["delete"].'"');
        }
    }

    if(isset($_POST["title"]) && isset($_POST["editor"]) && isset($_POST["categories"])){
        $categories = implode(", ", $_POST["categories"]);
        $sujet = new Sujet(hash("md5", $_POST["title"]), $_POST["title"], $_POST["editor"], $categories, $_SESSION["user"]->username, "0", date("Y-m-d H:i:s"));
        $sujet->add();
    }

    $sujets = Sujet::select("*", "", "date DESC");
    $categories = Categorie::all();

    require "../public/views/share/header.php";
    require "../public/views/forum.php";
    require "../public/views/share/footer.php";

?>