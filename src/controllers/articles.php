<?php
	use app\models\entity\Article;
	use app\models\repository\EntityRepository;

	$titre = "Articles";
	app\app::addRessource("style/articles.less");
	app\app::addRessource("js/articles.js");


	$articleExists = true;

	if(isset($_GET["article"])){
		$articleId = $_GET["article"];
		$article = Article::select("*", 'id = "'.$articleId.'"', "");
		if($article == null){
			$articleExists = false;
		}else{
			$article = $article[0];
		}
	}else{
		$articleExists = false;
	}

	require("./views/share/header.php");
	require("./views/articles.php");
	require("./views/share/footer.php");
?>
