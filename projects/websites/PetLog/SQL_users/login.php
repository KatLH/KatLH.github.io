<?php
	session_start();
	include '../sql/db_connect.php';

	//Login PHP code
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$pass_hash = sha1($_POST['password']);

	$sql = "SELECT user_id FROM user_accounts WHERE username = '".$user."' and password = '".$pass_hash."' LIMIT 1";

	$result = mysqli_query($connection, $sql);

  if (mysqli_num_rows($result) == 1)
  {
		$row = mysqli_fetch_row($result);
  		$_SESSION['loggedin'] = true;
		header('Refresh: 2 url=../index.php');

		echo 'Login successful!';
		echo '<br><br>';
		echo '<a href="index.php">Continue to Pawster.com</a>';
	}
	else {
		echo 'Please try again';
	}

 ?>
