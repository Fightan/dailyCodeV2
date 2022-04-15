<h1>Forum</h1>

<div id="forum">
    <div class="container">
        <div class="row">
            <table id="table">
                <colgroup>
                    <col span="1" style="width: 40%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 5%;">
                </colgroup>
                <tr id="main">
                    <th>Sujet</th>
                    <th>Auteur</th>
                    <th class="text-center">Réponses</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                <?php
                    use app\models\entity\Sujet;
                    use app\models\entity\Categorie;

                    foreach($sujets as $message){
                        $date = date("Y-m-d", strtotime($message->date));
                        if($date === date("Y-m-d")){
                            $date = "Aujourd'hui";
                        }
                        if($user != ""){
                            if($message->auteur === $user->username){
                                $visibility = "d-block";
                            }else{
                                $visibility = "d-none";
                            }
                        }else{
                            $visibility = "d-none";
                        }
                        echo <<<html
                            <tr>
                                <td class="link"><a href="?m=$message->id_sujet">$message->nom_sujet</a></td>
                                <td>$message->auteur</td>
                                <td class="text-center">$message->reponses</td>
                                <td>$message->categories</td>
                                <td>$date</td>
                                <td>
                                    <div class="dp">
                                        <input id="showMenu" class="d-none" type="checkbox"/>
                                        <i class="icon fa-solid fa-ellipsis-vertical"></i>
                                        <div class="dp-menu">
                                            <a href="/message" class="item voir">Voir</a>
                                            <span class="item delete $visibility" data-id="$message->id_sujet">Supprimer</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        html;
                    }
                ?>
            </table> 
        </div>
        <div class="popup row justify-content-center align-content-center">
            <div class="text-center popup-content">
                <div class="popup-header">
                    <h3>Supprimer un sujet</h3>
                </div>
                <div class="popup-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce sujet ?</p>
                    <form method="post" action="forum" class="popup-footer">
                        <button id="delete" class="btn btn-danger" type="submit" name="delete" value="id">Supprimer</button>
                        <button id="cancel" class="btn btn-secondary">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
        <h2 style="<?=$connect?>"><a id="connect" href="connexion?p=<?=ltrim($_SERVER["REQUEST_URI"], "/")?>">Connectez-vous&nbsp;</a>pour poster un nouveau sujet</h2>
        <div class="row" style="<?=$nouveauSujet?>">
            <h2>Nouveau sujet</h2>
            <form id="form" method="post" action="forum">
                <input class="col-6 title" type="text" name="title" id="title" placeholder="Entrez le titre de votre sujet">

                <div class="col-12"></div>
                <h3>Choisissez vos catégories</h3>
                <div id="#categories">
                    <?php
                        foreach($categories as $categorie){
                            echo <<<html
                                <label class="button">
                                    <input class="d-none" type="checkbox" name="categories[]" value="$categorie->nom">$categorie->nom
                                </label>
                            html;
                        } 
                    ?>
                </div>
                <div id="editor" placeholder="Entrez votre texte"></div>

                <input id="sendForm" class="sendFormInactive" type="submit" value="Poster le sujet">
            </form>
        </div>
    </div>

</div>
