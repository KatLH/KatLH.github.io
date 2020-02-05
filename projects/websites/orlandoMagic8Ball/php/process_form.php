<?php
	session_start();
	include 'db_connect.php';

	$prediction = $_POST['prediction'];

	$sql = "INSERT INTO predictions (prediction) VALUES ('$prediction')";

	if(mysqli_query($connection, $sql)) {
		echo '<br>Success!';
	} else {
		die('<br>Could not connect to database: ' . mysqli_error($connection));
		
	}

	mysqli_close($connection);
?>