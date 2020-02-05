<?php
	session_start();
	include '../sql/db_connect.php';

	//Register PHP code
	$first = $_POST["firstname"];
	$last = $_POST["lastname"];
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$pass_hash = sha1($_POST['password']);

	$sql ="INSERT INTO user_accounts(firstname, lastname, username, password) VALUES('$first','$last','$user','$pass_hash')";

	$_SESSION['loggedin'] = true;

	mysqli_query($connection, $sql);
	mysqli_close($connection);

	echo 'You have successfully created an account!';
	echo '<br><br>';
	echo '<a href="index.php">Continue to Pawster.com</a>';

 ?>
