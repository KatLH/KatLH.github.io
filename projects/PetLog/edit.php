<?php
session_start();
include 'sql/db_connect.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- ICON -->
	<link rel="shortcut icon" href="img/icon/favicon_tags.ico" type="image/x-icon">
	<link rel="icon" href="img/icon/favicon_tags.ico" type="image/x-icon">

	<!-- CSS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--google icons-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> <!--materialize css-->
	<link rel="stylesheet" href="css/main.css">

	<!-- JAVASCRIPT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!--jQuery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> <!--materialize JS-->
	<script src="js/main.js"></script>
	<title>Pawsterl Portal</title>
</head>
<body>
	<!--NAVBAR-->
	<?php
	if(!isset($_SESSION['loggedin'])) 
	{ ?>
		<nav>
			<div class="nav-wrapper greenk">
				<a href="index.php" class="brand-logo center fredoka">PAWSTER PARENTS</a>
				<a href="index.php" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="index.php">Login</a></li>
					<li><a href="index.php">Register</a></li>
				</ul>
			</div>
		</nav>

		<ul class="sidenav" id="mobile-demo">
			<li><a href="index.php">Login</a></li>
			<li><a href="index.php">Register</a></li>
		</ul>
	<?php
	} 
		else 
		{ ?>
			<nav>
				<div class="nav-wrapper greenk">
					<a href="index.php" class="brand-logo center fredoka">PAWSTER PARENTS</a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="portal.php">Pawster Portal</a></li>
						<li><a href="SQL_users/logout.php">Logout</a></li>
					</ul>
				</div>
			</nav>

			<ul class="sidenav" id="mobile-demo">
				<li><a href="index.php">Home</a></li>
				<li><a href="portal.php">Pawster Portal</a></li>
				<li><a href="SQL_users/logout.php">Logout</a></li>
			</ul>
		<?php
		} ?>

	<!--MAIN-->
	<main>
		<div class="container">
			<br>
			<div class="row">
				<div class="col s6 m6">
					<a href="portal.php" class="links cooper_hewitt-Bold blue-text text-darken-1">< Back to Pawster Portal</a>
				</div> <!--End col s6 m4-->
			</div> <!--End row-->
			<!--
				User selects which form they would like and then sent to form.php. 
			-->
			<div class="row">
				<div class="col s12 m5 offset-m4">
					<form id="chooseForm" action="" method="POST">
						<div class="input-field">
							<h4 class="subheading flow-text cooper_hewitt-Bold blue-text text-darken-1">Edit Pawster Animals</h4>
							<select name="formChoice" id="formChoice" class="browser-default">
								<option value="null" disabled selected>Select one:</option>
								<option id="add" value="add">Add New Pawster Animal</option>
								<option id="update" value="update">Edit Pawster Animal Information</option>
								<option id="deactivate" value="deactivate">Deactivate Pawster Animal</option>
								<option id="delete" value="delete">Remove Pawster Animal</option>
							</select>
							<input type="submit" name="submit" value="Submit">
						</div>
					</form>
				</div>
			</div> <!--End row-->

			<!--Loading message-->
			<div class="row">
				<!--Error/Success message-->
				<div class="col s12 m12">
					<div id="response"></div>
				</div>
				<div class="col s12 m12">
					<div id="loading"></div>
				</div>
			</div> <!--End row-->

			<!--Load in the requested form-->
			<div class="row">
				<div class="col s12 m10 offset-m1 l10 offset-l1">
					<div id="form">
						<?php
							if (isset($_POST['submit'])) {
								switch ($_POST['formChoice']) {
									case "add":
										include "forms/addForm.php";
										break;
									case "update":
										include "forms/updateForm.php";
										break;
									case "deactivate":
										include "forms/deactivateForm.php";
										break;
									case "delete":
										include "forms/deleteForm.php";
										break;
									case "null":
										echo "Please try again.";
										break;
									default:
										echo "Select a form option.";
								}
							}
						?>
						<br>
						<div class="col s12 m5 offset-m5">
							<br><br>
							<img class="responsive-img" src="img/portal/happyCat.png" alt="Happy cat head">
						</div>
					</div> <!--End form-->
				</div>
			</div> <!--End row-->
		</div> <!--End container-->
	</main>

	<!--FOOTER-->
	<footer class="grey lighten-3">
		<div class="footer-copyright">
			<div class="container">
				<p class="center blue-grey-text text-darken-4">© 2019 Pawster Parents</p>
			</div>
		</div>
	</footer>
</body>
</html>
