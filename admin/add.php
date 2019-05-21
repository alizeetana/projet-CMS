<?php 

session_start();

include_once('../includes/connection.php');


if(isset($_SESSION['logged_in'])) {

	if (isset($_POST['title'], $_POST['content'])) {
			$title = $_POST['title'];
			$content = $_POST['content'];

			if (empty($title) or empty($content)) {

				$error = 'All fields are required!';
			} else {

				$query = $pdo->prepare('ISERT INTO articles (article_title, article_content, article_timestamp) VALUES (?, ?, ?,)');

				$query->bindValue(1, $title);
				$query->bindValue(2, $content);
				$query->bindValue(3, time());

				$query->execute();
				/*?>
				<?php echo $query; ?>
				<?php */
				header('Location: index.php');
			}

	}

	?>

	<html>
			<head>
				<title>CMS Platform</title>
				<link rel="stylesheet" href="../assets/style.css" />
			</head>

			<body>
				<div class="container">
					<a href="index.php" id="logo">CMS</a>	

					<br />

					<h4>Add Article</h4>


				<?php if (isset($error)) { ?>
					<small style="color:#aa0000;"><?php echo $error; ?></small>

				<br /><br />

				<?php } ?>

					<form action="add.php" method="post" autocomplete="off">
						<input type="text" name="title" placeholder="Title" /><br /><br />
						<textarea rows="25" cols="85" name="content" placeholder="Content"></textarea><br /><br />
						<input type="submit" value="Add Article" />
					</form>
				</div>
			</body>
		</html>


	<?php 
} else {
	header('Location: index.php');
}
?>