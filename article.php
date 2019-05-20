<?php 

include_once('includes/connection.php');
include_once('includes/article.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $article->fetch_data($id);

	print_r($data);
}else {
	header('Location: index.php');
	exit();
}

?> 