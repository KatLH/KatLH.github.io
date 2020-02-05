<?php
	session_start();

  if(isset($_SESSION['loggedin']))
  {
    unset($_SESSION['loggedin']);
		echo 'You are now logged out.';
		header('Location: ../index.php');
 	}
  else
  {
		$_SESSION['loggedin'] = false;
		header('Location: ../index.php');
	}
?>
