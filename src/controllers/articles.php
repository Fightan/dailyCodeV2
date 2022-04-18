<?php
	use app\models\entity\Article;
	use app\models\repository\EntityRepository;

	$titre = "Articles";
	app\app::addRessource("./assets/style/articles.less");
	app\app::addRessource("./assets/js/articles.js");


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
		$articles = Article::all();
	}

	require("./views/share/header.php");
	require("./views/articles.php");
	require("./views/share/footer.php");
?>
