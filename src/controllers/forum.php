<?php
    use app\app;
    use app\models\entity\Sujet;
    use app\models\entity\Categorie;
    use app\models\entity\User;
    use app\models\entity\Message;

    $titre = "Forum";
    app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css");
    app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js");
    app::addRessource("https://www.kryogenix.org/code/browser/sorttable/sorttable.js");
    app::addRessource("style/forum.less");
    app::addRessource("js/forum.js");

    //Afficher ou non l'interface d'ajout d'un nouveau sujet
    $nouveauSujet = false;
    $user = "";
    //Si l'utilisateur est connecté on lui permet d'ajouter un sujet
    if(isset($_SESSION["user"])){
        $user = $_SESSION["user"];
        $nouveauSujet = true;
    }

    //Suppression d'un sujet du forum
    //Si l'utilisateur est l'auteur du sujet alors il peut le supprimer
    date_default_timezone_set("Europe/Paris");
    if(isset($_POST["delete"])){
        $sujet = sujet::select("*", 'id_sujet = "'.$_POST["delete"].'"', "")[0];
        if($sujet->auteur === $_SESSION["user"]->username){
            $sujet->delete('id_sujet = "'.$_POST["delete"].'"');
        }
    }

    //Ajout d'un nouveau sujet
    if(isset($_POST["title"]) && isset($_POST["editor"]) && isset($_POST["categories"])){
        $categories = implode(", ", $_POST["categories"]);
        $sujet = new Sujet(hash("md5", $_POST["title"]), $_POST["title"], $_POST["editor"], $categories, $_SESSION["user"]->username, "0", date("Y-m-d H:i:s"));
        $sujet->add();
    }

    //On récupère le nombre de pages afin d'afficher les boutons 1, 2, 3... pour changer de page
    $nombreSujets = Sujet::count();
    $pages = 1;
    if($nombreSujets > 10){
        $pages = (int) ($nombreSujets/10) + 1;
    }
    
    //On récupère la page sélectionnée actuellement
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page = 1;
    }

    //On affiche les sujets par nombre de 10 par page
    if($page > 1){
        $sujets = Sujet::select("*", "", "date DESC LIMIT ".($page*10)." OFFSET 10");
    }else{
        $sujets = Sujet::select("*", "", "date DESC");
    }

    //On récupère toutes les catégories pour les afficher dans l'ajout d'un sujet
    $categories = Categorie::all();
    Message::create();
    require "../public/views/share/header.php";
    require "../public/views/forum.php";
    require "../public/views/share/footer.php";

?>