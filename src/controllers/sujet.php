<?php
    use app\app;
    use app\models\entity\Sujet;
    use app\models\entity\Categorie;
    use app\models\entity\User;
    use app\models\entity\Message;

    $titre = "Forum";
    app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css");
    app::addRessource("https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js");
    app::addRessource("./assets/style/sujet.less");
    app::addRessource("./assets/js/sujet.js");

    //Afficher ou non l'interface d'ajout d'un nouveau message
    $nouveauMessage = false;
    $sujetExists = true;
    $user = "";
    //Si l'utilisateur est connecté on lui permet d'ajouter un message
    if(isset($_SESSION["user"])){
        $user = $_SESSION["user"];
        $nouveauMessage = true;
    }

    if(isset($_GET["m"])){

        $sujetGet = $_GET["m"];
        if(substr($sujetGet, 0, 5) === "sujet"){

            $id_sujet = substr($sujetGet, 5);
            $sujet = Sujet::select("*", 'id_sujet = "'.$id_sujet.'"', "");
            if($sujet == null){
                $sujetExists = false;
            }else{
                $sujet = $sujet[0];
                Message::setTable($sujetGet);

                date_default_timezone_set("Europe/Paris");
                if(isset($_POST["delete"])){
                    $message = Message::select("*", 'id = "'.$_POST["delete"].'"', "")[0];
                    if($message->auteur === $_SESSION["user"]->username){
                        $message->delete('id = "'.$_POST["delete"].'"');

                        $sujet->setReponses(Message::count());
                        $sujet->update('id_sujet = "'.$sujet->id_sujet.'"');
                    }
                }

                if(isset($_POST["editor"])){
                    $message = new Message(hash("md5", $_SESSION["user"]->username.random_bytes(10)), $_POST["editor"], $_SESSION["user"]->username, date("Y-m-d H:i:s"));
                    $message->add();

                    $userStats->setNombreMessages($userStats->getNombreMessages() + 1);
                    $userStats->update("id = ".$userStats->id);

                    $sujet->setReponses(Message::count());
                    $sujet->update('id_sujet = "'.$sujet->id_sujet.'"');
                }

                $messages = Message::all();
                $titre = $sujet->nom_sujet;
            }
        }else{
            $sujetExists = false;
        }
    }else{
        $sujetExists = false;
    }

    //On récupère le nombre de pages afin d'afficher les boutons 1, 2, 3... pour changer de page
    $nombreSujets = Sujet::count();
    $pages = 1;
    if($nombreSujets > 10){
        if($nombreSujets%10 == 0){
            $pages = $nombreSujets/10;
        }else{
            $pages = (int)($nombreSujets/10)+1;
        }
    }else{
        $pages = 1;
    }
    
    //On récupère la page sélectionnée actuellement
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page = 1;
    }

    //On affiche les sujets par nombre de 10 par page
    if($sujetExists){
        if($page > 1){
            $sujets = Message::select("*", "", "date DESC LIMIT 10 OFFSET ".(($page-1)*10));
        }else{
            $sujets = Message::select("*", "", "date DESC LIMIT 10");
        }
    }

    require "./views/share/header.php";
    require "./views/sujet.php";
    require "./views/share/footer.php";
?>