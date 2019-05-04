<!DOCTYPE html>
<html>
<head>
	<title>AdminPanel</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<meta name="viewport" content="width=device-width">
</head>
<body>
	<?php require_once "validate.php"; ?>
	<header>
		<div class="logo">LOGO</div>
		<div class="login-reg">
			<a href="main.php">Home</a>
			<a href="AdminPanel.php" id="addStudent">Add Student</a>
			<a href="#" id="viewAll">View all students</a>
			<a href="login.php?logout=<?php echo "@"; ?>" id="login">Logout</a>
		</div>
	</header>
	<div class="main">
		<div class="registration show" id="reg">
			<form method="POST" action="validate.php">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<?php 
					if($update == true):
				?>
				<div class="form-header" id="regTitle">Students Profile</div>
				<?php 
					else:
				?>
				<div class="form-header" id="regTitle">Registration Form</div>
				<?php 
					endif;
				?>
				<input type="text" name="firstname" placeholder="Enter your firstname" value="<?php echo($firstname); ?>" required>
				<input type="text" name="lastname" placeholder="Enter your lastname" value="<?php echo($lastname); ?>" required>
				<input type="email" name="email" placeholder="Enter your email" value="<?php echo($email); ?>" required>
				<input type="text" name="username" placeholder="Enter your username" value="<?php echo($username); ?>" required>
				<input type="password" name="password" placeholder="Enter your password" value="<?php echo($password); ?>" required>
				<?php 
					if($update == true):
				?>
				<button type="submit" name="update" id="regBtn">Update</button>
				<?php 
					else:
				?>
				<button type="submit" name="register" id="regBtn">Register Now</button>
				<?php 
					endif;
				?>
			</form>
		</div>
		<?php  
			$mysqli = new mysqli('localhost', 'root', '', 'studentregistration') or die(mysqli_error($mysqli));

			$result = $mysqli->query('select * from studentregister order by id asc') or die(mysqli_error($mysqli));
		?>
		<div id="allStudents" class="hide">
			<table>
				<thead>
					<tr>
						<th>S/N</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>E-mail</th>
						<th>Username</th>
						<th>password</th>
						<th colspan="2"></th>

					</tr>
				</thead>
				<?php while($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo($row['id']); ?></td>
					<td><?php echo($row['firstname']); ?></td>
					<td><?php echo($row['lastname']); ?></td>
					<td><?php echo($row['email']); ?></td>
					<td><?php echo($row['username']); ?></td>
					<td><?php echo($row['password']); ?></td>
					<td>
						<a id="edit" href="AdminPanel.php?edit=<?php echo $row['id']; ?>" class="buttons">Edit</a>
    					<a href="validate.php?delete=<?php echo $row['id']; ?>" class="buttons">Delete</a>
					</td>
				</tr>
			<?php endwhile; ?>
			</table>
		</div>
	</div>
	<script type="text/javascript" src="script2.js"></script>
</body>
</html>