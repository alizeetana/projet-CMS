<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	?>


	<html>
			<head>
				<title>CMS Platform</title>
				<link rel="stylesheet" href="../assets/style.css" />
			</head>

			<body>
				<div class="container">
					<a href="../index.php" id="logo">CMS</a>	

					<br />

					<ol>
						<li><a href="add.php">Add Article</a></li>
						<li><a href="delete.php">Delete Article</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ol>	
				</div>
			</body>
		</html>


	<?php 
} else {
if (isset($_POST['username'], $_POST['password'])) {
			$username = $_POST['username'];
			$password = ($_POST['password']);

			if (empty($username) or empty($password)) {

				$error = 'All fields are required';

			} else {

				$query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ? ");

				$query->bindValue(1, $username);
				$query->bindValue(2, $password);

				$query->execute();

				
				$num = $query->rowCount();
				
				/*$num = 1;*/

				

				if ($num == 1) {

					$_SESSION['logged_in'] = true;
					$_SESSION['username'] = $username;
					header('Location: ../index.php');
					exit();

				} else {

					$error = 'Incorect details...';
				}
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
				<h4>Login</h4>	

				<br />

				<?php if (isset($error)) { ?>
					<small style="color:#aa0000;"><?php echo $error; ?></small>

				<br /><br />

				<?php } ?>
		
				<form action="index.php" method="post" autocomplete="off">
					<p>
					<label>Username</label>
					<input type="text" name="username" placeholder="Username" />
					</p>
					<p>
					<label>Password</label>
					<input type="password" name="password" placeholder="Password" />
					</p>
					<input type="submit" name="logged_in" value="login" />
				</form>
			</div>
		</body>
	</html>


	<?php } ?>