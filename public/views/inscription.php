<div class="container" id="inscription">
    <?php
        if(!$inscription){
            echo <<<html
                <div class="row text-center">
                    <h1>Inscription réussie</h1>
                </div>
            html;
        }else{
            echo <<<html
            <div class="row text-center">
                <h1>Inscription</h1>
                <form method="post" action="inscription?p=$defaultPage" class="row">
                    <label>
                        <h2>
                            Nom d'utilisateur
                        </h2>
                        <input id="username" name="username" type="text" placeholder="Entrez votre nom d'utilisateur..." value="$username">
                        <span class="error" style="visibility:$visibilityUsername">Nom d'utilisateur déjà existant</span>
                    </label>
                    <label>
                        <h2>
                            Adresse mail
                        </h2>
                        <input id="email" name="email" type="text" placeholder="Entrez votre adresse mail..." value="$email">
                        <span class="error" style="visibility:$visibilityEmail">Adresse mail déjà existante</span>
                    </label>
                    <label>
                        <h2>
                            Mot de passe
                        </h2>
                        <input id="password" name="password" type="password" placeholder="Entrez votre mot de passe...">
                        <span class="error" style="visibility:$visibilityPassword">Mot de passe invalide</span>
                    </label>
                    <label>
                        <h2>
                            Confirmez-votre mot de passe
                        </h2>
                        <input id="confirmPassword" type="password" placeholder="Confirmez votre mot de passe...">
                        <span id="confirmPasswordError" class="error" style="visibility:hidden">Mots de passe non-similaires</span>
                    </label>
                    <label>
                        <input class="d-none" type="text" name="p" value="$defaultPage">
                    </label>
                    <label class="d-flex justify-content-center">
                        <input disabled id="send" type="submit" value="S'inscrire">
                    </label>
                </form>
            </div>
            html;
        }
    ?>
</div>