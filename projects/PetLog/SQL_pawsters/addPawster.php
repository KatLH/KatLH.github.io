<?php
	session_start();
	include '../sql/db_connect.php';

	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$age = $_POST["age"];
	$species = $_POST["species"];
	$breed = $_POST["breed"];
	$color = $_POST["color"];
	$notes = $_POST["notes"];

	$sql ="INSERT INTO pawsterAnimals(name, gender, age, species, breed, color, notes) 			VALUES('$name','$gender','$age','$species','$breed','$color','$notes');";

	if(!mysqli_query($connection, $sql)) {
		//die('<br>Could not connect to database: ' . mysqli_error($connection));
	} else {
		echo '<br>Successfully added new Pawster animal!';
	}

	mysqli_close($connection);
 ?>
