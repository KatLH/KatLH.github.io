<?php
	session_start();
	include '../sql/db_connect.php';

	$pid = $_POST['pid'];

	$sql = "UPDATE pawsterAnimals 
			SET status = 'Inactive'
			WHERE foster_id = '".$pid."'
			LIMIT 1";

	$result = mysqli_query($connection, $sql);

	if ($result == 1)
	{
		echo "Pawster animal status is inactive.";
	}
	else {
		die('<br>Could not connect to database: ' . mysqli_error($connection));
	}

	mysqli_close($connection);

?>

