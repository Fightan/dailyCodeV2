<nav id="header">
    <div class="container-md">
        <div id="header-inline" class="row justify-content-between align-items-center">
            <div id="logo" class="col-2 d-flex justify-content-start">
                <a href="accueil">
                    <span>daily</span>
                    <span>Code</span>
                </a>
            </div>
            <div class="menu col-8 col-md-6 d-flex justify-content-between">
                <a class="link" href="accueil"><div class="link d-flex justify-content-center align-items-center"><span>Accueil</span></div></a>
                <a class="link" href="articles"><div class="link d-flex justify-content-center align-items-center"><span>Articles</span></div></a>
                <a class="link" href="forum"><div class="link d-flex justify-content-center align-items-center"><span>Forum</span></div></a>
                <a class="link" href="contact"><div class="link d-flex justify-content-center align-items-center"><span>Contact</span></div></a>
                <a class="link" href="a-propos"><div class="link d-flex justify-content-center align-items-center"><span>À propos</span></div></a>
            </div>
            <div class="login col-2 d-flex justify-content-end">
                <?php
                    if(isset($_SESSION["user"])){
                        // $method = "deconnexion?p=".ltrim($_SERVER["REQUEST_URI"], "/");
                        $method = "compte";
                        $phrase = "Compte";
                        $icon = "fa-solid fa-circle-user";
                    }else{
                        if(!isset($_GET["p"])){
                            $method = "connexion?p=".ltrim($_SERVER["REQUEST_URI"], "/");
                        }else{
                            $method = "connexion?p=".$_GET["p"];
                        }
                        $phrase = "Connexion";
                        $icon = "fa-solid fa-lg fa-arrow-right-to-bracket";
                    }
                    if($match["target"] == "compte"){
                        $method = "deconnexion?p=accueil";
                        $phrase = "Déconnexion";
                    }
                    echo <<<html
                        <a href="/$method">
                            <div id="compte" class="link d-flex justify-content-center align-items-center">
                                <span>$phrase
                                    <i id="login" class="$icon"></i>
                                </span>
                            </div>
                        </a>
                    html;
                ?>
            </div>
        </div>
    </div>
</nav>