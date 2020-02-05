<?php
session_start();
include '../sql/db_connect.php';

$status = $_POST['pawsterStatus'];

/*
	Check to see if the value of $status is equal to 
	dogActive, dogInactive, catActive, or catInactive.
*/
if ($status == "dogActive") {
	$sql = "SELECT * FROM pawsterAnimals WHERE status = 'Active' and species = 'Dog';";
} 	
	else if ($status == "dogInactive") {
		$sql = "SELECT * FROM pawsterAnimals WHERE status = 'Inactive' and species = 'Dog';";
	} 
		else if ($status == "catActive") {
			$sql = "SELECT * FROM pawsterAnimals WHERE status = 'Active' and species = 'Cat';";
		} 
			else if ($status == "catInactive") {
				$sql = "SELECT * FROM pawsterAnimals WHERE status = 'Inactive' and species = 'Cat';";
			} 
				else {
					echo "You don't have any Pawster animals";
				}

/*
	Query the database and display results
*/
$result = mysqli_query($connection, $sql);
$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0)
	{ 	// output data of each row
		while($row = mysqli_fetch_assoc($result))
		{
			/* 
				Display Pawster animals. 
			*/
			echo '<div class="row">';
				echo '<div class="card horizontal">';
					// Pawster animal image
					echo '<div class="card-image grey lighten-3">';
						echo "<img class='responsive-img' src='img/pawsterAnimals/" . $row['image'] . "' alt='Picture of a Pawster animal'>";
					echo '</div> <!--End card-image-->';

					echo '<div class="card-stacked grey lighten-5">';
						echo '<div class="card-content">';
							// Pawster cat information
							echo '<div class="row">';
								echo "<div class='col s12 m6 l4'>";
									echo "<span class='cooper_hewitt-Bold name blue-text text-darken-1'>" . $row['name'] . "</span><br>";
									echo "<span class='open-sans-Bold'>Species:</span> " . $row['species'] . "<br>";
									echo "<span class='open-sans-Bold'>Gender:</span> " . $row['gender'] . "<br>";
									echo "<span class='open-sans-Bold'>Age:</span> " . $row['age'] . "<br>";
								echo '</div>';

								echo "<div class='col s12 m6 l4'>";
									echo "<span class='open-sans-Bold'>Pawster ID:</span> " . $row['foster_id'] . "<br>";
									echo "<span class='open-sans-Bold'>Status:</span> " . $row['status'] . "<br>";
									echo "<span class='open-sans-Bold'>Breed:</span> " . $row['breed'] . "<br>";
									echo "<span class='open-sans-Bold'>Color:</span> " . $row['color'] . "<br>";
								echo '</div>';

								echo "<div class='col s12 m12 l4'>";
									echo "<span class='open-sans-Bold'>Notes:</span><br>" . $row['notes'];
								echo '</div>';
							echo '</div> <!--End row-->';
						echo '</div> <!--End card-content-->';
					echo '</div> <!--End card-stacked-->';
				echo '</div> <!--End card-horizontal-->';
			echo '</div>';
		} //End while loop
	} //End if Statement
		else
		{
			echo "There are currently no active pawster animals.";
		} //End else statment
		mysqli_close($connection);
 ?>
