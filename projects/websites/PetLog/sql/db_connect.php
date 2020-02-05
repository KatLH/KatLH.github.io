<?php
  $username = "ka119724";
  $password = "Periwinkle357@";
  $dbname = "ka119724";

  $connection = mysqli_connect("localhost" , "$username" , "$password", "$dbname") or die(mysql_error());

/*
  if (!$connection){ //If the connection fails
  		echo "<br/> Could not connect. <br/>";
  		die(mysql_error()); //Close connection and present error message
  }else{
  	echo 'Connected successfully';
  }
*/
?>
