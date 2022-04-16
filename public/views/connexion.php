<div class="container" id="connexion">
    <?php
        if(!$connexion){
            echo <<<htlm
                <div class="row text-center">
                    <h1>Connexion réussie</h1>
                </div>
            htlm;
        }else{
            echo <<<html
            <div class="row text-center">
                <h1>Connexion</h1>
                <form method="post" action="connexion?p=$defaultPage" class="row">
                    <label>
                        <h2>
                            Nom d'utilisateur
                        </h2>
                        <input id="username" name="username" type="text" placeholder="Entrez votre nom d'utilisateur..." value="$username">
                        <span id="noUser" style="visibility:$visibilityUsername">Cet utilisateur n'existe pas</span>
                    </label>
                    <label>
                        <h2>
                            Mot de passe
                        </h2>
                        <input id="password" name="password" type="password" placeholder="Entrez votre mot de passe..." value="$password">
                        <span id="noUser" style="visibility:$visibilityPassword">Mot de passe incorrect</span>
                    </label>
                    <label>
                        <input class="d-none" type="text" name="p" value="$defaultPage">
                    </label>
                    <label class="d-flex justify-content-center">
                        <input disabled id="send" type="submit" value="Se connecter">
                    </label>
                </form>
                <span>Vous n'êtes pas encore inscrit ? <a href="inscription?p=$defaultPage">Inscrivez-vous ici !</a></span>
            </div>

            html;
        }
    ?>
</div>