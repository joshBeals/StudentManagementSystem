<?php 

session_start();

$id = 0;
$update = false;
$firstname = '';
$lastname = '';
$email = '';
$username = '';
$password = '';

$mysqli = new mysqli('localhost', 'root', '', 'studentregistration') or die(mysqli_error($mysqli));

if(isset($_POST['register'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = $mysqli->query("insert into studentregister (firstname, lastname, email, username, password) values ('$firstname', '$lastname', '$email', '$username', '$password')") or die($mysqli->error);
	if($result){
		echo("Registration Successful!");
	}else{
		echo('Error in query');
	}
	
}

function checkAdmin(){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	if($username == 'admin' && $password == 'admin'){
		header('location: adminPanel.php');
	}else{
		login();
	}
}

function login(){
	$mysqli = new mysqli('localhost', 'root', '', 'studentregistration') or die(mysqli_error($mysqli));
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$result = $mysqli->query("select * from studentregister where username='$username' and password='$password'") or die($mysqli->error);
	$row = $result->fetch_array();
	$num = mysqli_num_rows($result);
	if($num == 1){
		$_SESSION['id'] = $row['id'];
		echo("login Successful");
		header("location: login.php");
	}else{
		echo("Incorrect details");
	}
}

if(isset($_POST['login'])){
	checkAdmin();
}

if(isset($_GET['logout'])){
	header("location: main.php");
}

if(isset($_GET['edit'])){
	$a = 1;

	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("select * from studentregister where id=$id") or die($mysqli->error);;
	$row = $result->fetch_array();
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$email = $row['email'];
	$username = $row['username'];
	$password = $row['password'];
}

if(isset($_POST['update'])){

	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = $mysqli->query("update studentregister set firstname='$firstname', lastname='$lastname', email='$email', username='$username', password='$password' where id=$id") or die($mysqli->error);

	if($result){
		echo("Update Successful");
	}else{
		echo("Didn't Update");
	}
}

if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$result = $mysqli->query("delete from studentregister where id=$id") or die($mysqli->error);

	if($result){
		echo("Delete Successful");
	}else{
		echo("Didn't Delete");
	}

}

?>