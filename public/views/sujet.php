<div class="container">
    <?php
        use app\models\entity\Sujet;
        use app\models\entity\Categorie;
        use app\models\entity\User;
        use app\models\entity\Message;
        
        if($sujetExists){
            echo <<<html
                <h1 class="text-start">$titre</h1>
            html;

            $rank = User::select("*", ' username = "'.$sujet->auteur.'"', "")[0]->rank;
            if($rank == "2"){
                $rank = "Utilisateur";
            }else{
                $rank = "Administrateur";
            }
            $date = date("Y-m-d", strtotime($sujet->date));
            if($date === date("Y-m-d")){
                $date = "Aujourd'hui";
            }
            echo <<<html
                <div class="card row">
                    <div class="bleu auteur col-6">$sujet->auteur<span class="rank">$rank</span></div>
                    <div class="bleu date col-6 d-flex flex-row text-end justify-content-end">
                        <div class="dp" style="pointer-events:none;">
                            $date
                            <i class="icon"></i>
                        </div>
                    </div>
                    <div class="message">$sujet->message</div>
                </div>
            html;
    
            foreach($messages as $message){
                $date = date("Y-m-d", strtotime($sujet->date));
                if($date === date("Y-m-d")){
                    $date = "Aujourd'hui";
                }

                if($user != ""){
                    if($message->auteur === $user->username){
                        $visibility = "d-block";
                        $icon = "fa-solid fa-ellipsis-vertical";
                        $dpStyle = "";
                    }else{
                        $visibility = "d-none";
                        $icon = "";
                        $dpStyle = "pointer-events:none;";
                    }
                }else{
                    $visibility = "d-none";
                }

                $rank = User::select("*", ' username = "'.$message->auteur.'"', "")[0]->rank;
                if($rank == "2"){
                    $rank = "Utilisateur";
                }else{
                    $rank = "Administrateur";
                }

                echo <<<html
                    <div class="card row">
                        <div class="bleu auteur col-6">$message->auteur<span class="rank">$rank</span></div>
                        <div class="bleu date col-6 d-flex flex-row text-end justify-content-end">
                            <div class="dp" data-active="false" style="$dpStyle">
                                <input class="d-none showMenu" type="checkbox"/>
                                $date
                                <i class="icon $icon" style=""></i>
                                <div class="dp-menu">
                                    <span class="item delete $visibility" data-id="$message->id">Supprimer</span>
                                </div>
                            </div>
                        </div>
                        <div class="message">$message->message</div>
                    </div>
                html;
            }  
        }
    ?>
</div>


<div id="forum">
    <div class="container">
        <div class="row">
            <div id="pages">
                <?php
                    if($sujetExists){
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
                    <p>Êtes-vous sûr de vouloir supprimer ce message ?</p>
                    <form method="post" action="<?=$_SERVER["REQUEST_URI"]?>" class="popup-footer">
                        <button id="delete" class="btn btn-danger" type="submit" name="delete" value="id">Supprimer</button>
                        <button id="cancel" class="btn btn-secondary">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $currentSite = ltrim($_SERVER["REQUEST_URI"], "/");
            if($sujetExists){
                if(!$nouveauMessage){
                        echo <<<html
                            <h2><a id="connect" href="connexion?p=$currentSite">Connectez-vous&nbsp;</a>pour poster un nouveau message</h2>
                        html;
                }else{
                    echo <<<html
                        <div class="row">
                            <form id="form" method="post" action="$currentSite">
                                <h2>Nouveau message</h2>
                                <div id="editor" placeholder="Entrez votre texte"></div>
                        
                                <input id="sendForm" class="sendFormInactive" type="submit" value="Poster le sujet">
                            </form>
                        </div>
                    html;
                }
            }else{
                echo <<<html
                    <h2 class="text-center">Ce sujet n'existe pas</h2>
                html;
            }
        ?>

    </div>
</div>
