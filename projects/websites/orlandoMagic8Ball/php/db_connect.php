<?php
  $username = "dig4503_group11";
  $password = "Knights125!#";
  $dbname = "dig4503_group11";

  $connection = mysqli_connect("localhost" , "$username" , "$password", "$dbname") or die(mysql_error());


  if (!$connection){ //If the connection fails
  		echo "<br/> Could not connect. <br/>";
  		die(mysql_error()); //Close connection and present error message
  }else{
  	//echo 'Connected successfully';
  }


?>