<!DOCTYPE html>
<html>
<head>
	<title>StudentRegistration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width">
</head>
<body>
	<?php require_once "validate.php"; ?>
	<header>
		<div class="logo">LOGO</div>
		<div class="login-reg">
			<a href="#" id="login">Login</a>
			<a href="#" id="register">Register</a>
		</div>
	</header>
	<div class="container">
		<div class="registration hide" id="reg">
			<form method="POST" action="validate.php">
				<div class="form-header">Registration Form</div>
				<input type="text" name="firstname" placeholder="Enter your firstname" required>
				<input type="text" name="lastname" placeholder="Enter your lastname" required>
				<input type="email" name="email" placeholder="Enter your email" required>
				<input type="text" name="username" placeholder="Enter your username" required>
				<input type="password" name="password" placeholder="Enter your password" required>
				<button type="submit" name="register">Register Now</button>
			</form>
		</div>
		<div class="registration show" id="log">
			<form method="POST" action="validate.php">
				<div class="form-header">Login Form</div>
				<input type="text" name="user" placeholder="Enter your username" required>
				<input type="password" name="pass" placeholder="Enter your password" required>
				<button type="submit" name="login">Login</button>
			</form>
		</div>
	</div>	
	<script type="text/javascript" src="script.js"></script>
</body>
</html>