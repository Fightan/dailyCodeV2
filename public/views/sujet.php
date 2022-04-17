<div class="container">
    <h1 class="text-start"><?=$titre?></h1>
    <?php
        
    ?>
    <div class="card row">
        <div class="bleu auteur col-6">Auteur <span class="rank"><\Rank></span></div>
        <div class="bleu date col-6 d-flex flex-row text-end justify-content-end">
            <div class="dp" data-active="false">
                <input class="d-none showMenu" type="checkbox"/>
                Salut
                <i class="icon fa-solid fa-ellipsis-vertical"></i>
                    <div class="dp-menu">
                        <a href="/message" class="item voir">Voir</a>
                        <span class="item delete $visibility" data-id="$message->id_sujet">Supprimer</span>
                    </div>
                </div>
        </div>
        <div class="message">Coucou</div>
    </div>
</div>


<div id="forum">
    <div class="container">
        <div class="row">
            <table id="table" class="sortable">
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
                                    <div class="dp" data-active="false">
                                        <input class="d-none showMenu" type="checkbox"/>
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
            <div id="pages">
                <?php
                    for($i = 1; $i <= $pages; $i++){
                        if(isset($_GET["page"])){
                            if($_GET["page"] == $i){
                                echo "<a href='' class='currentPage'>$i</a>";
                            }else{
                                echo "<a href='?page=$i'>$i</a>";
                            }
                        }else{
                            if($i == 1){
                                echo "<a href='' class='currentPage'>$i</a>";
                            }else{
                                echo "<a href='?page=$i'>$i</a>";
                            }
                        }
                    }
                ?>
            </div>
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
        <?php
            $currentSite = ltrim($_SERVER["REQUEST_URI"], "/");
            if(!$nouveauSujet){
                echo <<<html
                    <h2><a id="connect" href="connexion?p=$currentSite">Connectez-vous&nbsp;</a>pour poster un nouveau sujet</h2>
                html;
            }else{
                echo <<<html
                    <div class="row">
                        <h2>Nouveau sujet</h2>
                        <form id="form" method="post" action="$currentSite">
                            <input class="col-6 title" type="text" name="title" id="title" placeholder="Entrez le titre de votre sujet">
            
                            <div class="col-12"></div>
                            <h3>Choisissez vos catégories</h3>
                            <div id="#categories">
                html;
                foreach($categories as $categorie){
                    echo <<<html
                            <label class="button">
                                <input class="d-none" type="checkbox" name="categories[]" value="$categorie->nom">$categorie->nom
                            </label>
                    html;
                } 
                echo <<<html
                            </div>
                            <div id="editor" placeholder="Entrez votre texte"></div>
                    
                            <input id="sendForm" class="sendFormInactive" type="submit" value="Poster le sujet">
                        </form>
                    </div>
                html;
            }
        ?>
    </div>
</div>
