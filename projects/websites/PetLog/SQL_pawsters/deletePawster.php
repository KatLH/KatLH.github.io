<?php
	session_start();
	include '../sql/db_connect.php';

	$pid = $_POST['pid'];

	$sql = "DELETE FROM pawsterAnimals
			WHERE foster_id = '".$pid."'";

	$result = mysqli_query($connection, $sql);

	if ($result)
	{
		echo "Pawster animal deleted.";
	}
	else {
		die('<br>Could not connect to database: ' . mysqli_error($connection));
	}

?>