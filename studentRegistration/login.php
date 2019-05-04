<!DOCTYPE html>
<html>
<head>
	<title>StudentPage</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<?php require_once "validate.php"; ?>
	<header>
		<div class="logo">LOGO</div>
		<div class="login-reg">
			<a href="login.php?logout=<?php echo "@"; ?>" id="login">Logout</a>
		</div>
	</header>
	<div class="container">
			<?php
				$id = $_SESSION['id'];
				$mysqli = new mysqli('localhost', 'root', '', 'studentregistration') or die(mysqli_error($mysqli));
				$result = $mysqli->query("select * from studentregister where id='$id'") or die($mysqli->error);
				$row = $result->fetch_array();echo"<br>";
			?>
		<div class="profile">
			<div class="header">Students Profile</div>
			<div class="content">
				<div class="left">
					<p>Student ID:</p>
					<p>Firstname:</p>
					<p>Lastname:</p>
					<p>E-mail:</p>
					<p>Username:</p>
					<p>Password:</p>
				</div>
				<div class="right">
					<p><?php echo($id); ?></p>
					<p><?php echo($row['firstname']); ?></p>
					<p><?php echo($row['lastname']); ?></p>
					<p><?php echo($row['email']); ?></p>
					<p><?php echo($row['username']); ?></p>
					<p><?php echo($row['password']); ?></p>
				</div>
			</div>
		</div>
		<?php unset($id); ?>
	</div>
</body>
</html>