<?php
	session_start();
	include '../sql/db_connect.php';

	$fid = $_POST['fid'];
	//$status = $_POST['status'];

	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$age = $_POST["age"];
	$species = $_POST["species"];
	$breed = $_POST["breed"];
	$color = $_POST["color"];
	$notes = $_POST["notes"];

	$sql = "UPDATE pawsterAnimals
			SET name = '".$name."',
				gender = '".$gender."',
				age = '".$age."',
				species = '".$species."',
				breed = '".$breed."',
				color = '".$color."',
				notes = '".$notes."'
			WHERE foster_id = '".$fid."'
			LIMIT 1";

	$result = mysqli_query($connection, $sql);

	if ($result == 1)
	{
		echo "Information updated.";
	}
	else {
		die('<br>Could not connect to database: ' . mysqli_error($connection));
	}

	mysqli_close($connection);

?>
