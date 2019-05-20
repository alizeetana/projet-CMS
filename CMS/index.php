<?php

include_once('includes/connection.php');
include_once('includes/articles.php');

$article = new Article;
$articles = $article->fetch_all();


?>

<html>
	<head>
		<title>CMS Platform</title>
		<link rel="stylesheet" href="assets/style.css" />
	</head>

	<body>
		<div class="container">
			<a href="index.php" id="logo">CMS</a>	
		

			<ol>
				<?php foreach ($articles as $article) { ?>
					
				<li>
					<a href="article.php?id=<?php echo $article['article_id']; ?>">
						<?php echo $article['article_title']; ?>
					</a> 

					- <small>
						posted on <?php echo date('l jS', $article['article_timestamp']); ?>
					</small>
				</li>
				<?php } ?>
			</ol>
		</div>
	</body>
</html>