<h1>Articles</h1>

<div class="articles">
    <div class="container">
        <div class="row">
            <?php
                if($articleExists){
                    echo <<<html
                        <h2>$article->nom</h2>
                        $article->content
                    html;
                }else{
                    echo '<h2 class="text-center">Cet article n\'existe pas</h2>';
                }
            ?>
        </div>
    </div>
</div>