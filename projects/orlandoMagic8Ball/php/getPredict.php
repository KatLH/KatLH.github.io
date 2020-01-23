<?php
	include 'db_connect.php';

	$predict_id = rand(1,10);

	$sql = "SELECT * FROM predictions WHERE predict_id='".$predict_id."' LIMIT 1";
	$result = mysqli_query($connection, $sql); 
	if (mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_row($result);
			echo $row[1];
			exit();
		}else{
			echo "There are currently no predictions";
			exit();
		}

	mysqli_close($connection);
?>