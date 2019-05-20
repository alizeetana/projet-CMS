<?php

	try {
		$pdo = new PDO('mysql:host=localhost;dbname=cms', 'root', '');
	} catch (PDOException $e) {

		exit('Database error.');
		/*echo "Connection failed.";
		$e->getMessage();
		echo $e;*/
	}

?>