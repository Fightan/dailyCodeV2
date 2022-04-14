<h1>Forum</h1>

<div id="forum">
    <div class="container">
        <div class="row">
            <table id="table">
                <colgroup>
                    <col span="1" style="width: 55%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 15%;">
                </colgroup>
                <tr id="main">
                    <th>Sujet</th>
                    <th>Auteur</th>
                    <th>Réponses</th>
                    <th>Date</th>
                </tr>
                <?php
                    use app\models\entity\SujetEntity;
                    foreach($sujets as $message){
                        echo <<<html
                            <tr>
                                <td class="link"><a href="?m=$message->id_sujet">$message->nom_sujet</a></td>
                                <td>$message->auteur</td>
                                <td>$message->reponses</td>
                                <td>$message->date</td>
                            </tr>
                        html;
                    }
                ?>
            </table> 
        </div>
        <div class="row">
            <h2>Nouveau sujet</h2>
            <form id="form" method="post" action="forum">
                <input class="col-6 title" type="text" name="title" id="title" placeholder="Entrez le titre de votre sujet">
                <div id="titleLengthError" class="d-none error">A minimum of 3 characters are required.</div>
                <div id="titleCharactersError" class="d-none error">Only alphabetical or numerical characters are allowed.</div>

                <div class="col-12"></div>
                <select name="categorie" id="categorie" class="col-3" placeholder="Choisissez une catégorie">
                    <option disabled selected>--Choisissez une catégorie--</option>
                    <?php
                        use app\models\entity\CategorieEntity;
                        foreach($categories as $categorie){
                            echo "<option value='$categorie->nom'>$categorie->nom</option>";
                        }
                    ?>
                </select>


                <div id="editor" placeholder="Entrez votre texte"></div>
                <div id="editorLengthError" class="d-none error">A minimum of 3 characters are required.</div>
                <div id="editorCharactersError" class="d-none error">Only alphabetic characters are allowed.</div>

                <input id="sendForm" class="sendFormInactive" type="submit" value="Poster le sujet">
            </form>
        </div>
    </div>
</div>
