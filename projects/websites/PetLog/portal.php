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

	<main>
		<div class="container">
			<br>
			<div class="row">
				<div class="col s12">
					<a href="edit.php" class="right links cooper_hewitt-Bold blue-text text-darken-1">Edit Pawster Animals ></a>
				</div> <!--End col s6 m4-->
			</div> <!--End row-->

			<!--
				User selects which Pawster animals they would like to view based on their status. 
			-->
			<div class="row">
				<div class="col s12 m6 offset-m3">
					<form id="selectPawster" action="SQL_pawsters/selectPawster.php" method="POST">
						<div class="input-field">
							<h4 class="subheading flow-text cooper_hewitt-Bold blue-text text-darken-1">View Pawster Animals</h4>
							<select class="browser-default" name="pawsterStatus">
									<option value="" disabled selected>Select one:</option>
								<optgroup label="Dogs">
									<option name="dogActive" value="dogActive">Active Pawster Dogs</option>
									<option name="dogInactive" value="dogInactive">Inactive Pawster Dogs</option>
								</optgroup>
								<optgroup label="Cats">
									<option name="catActive" value="catActive">Active Pawster Cats</option>
									<option name="catInactive" value="catInactive">Inactive Pawster Cats</option>
								</optgroup>
							</select>
						</div>
					</form>
				</div>
			</div> <!--End row-->

			<!--Loading & Error/Success message-->
			<div class="col s4 offset-s4">
				<div id="loading"></div>
				<div id="response"></div>
			</div>

			<!--Display status results-->
			<div class="row">
				<div class="col s12 m12">
					<div id="pawsterPortal">
						<br>
						<div class="col s12 m6 offset-m4">
							<img class="responsive-img" src="img/portal/happyDog.png" alt="Happy dog head">
						</div>
					</div>
				</div>
			</div> <!--End row-->

		</div> <!--End container-->
	</main>

	<footer class="grey lighten-3">
		<div class="footer-copyright">
			<div class="container">
				<p class="center blue-grey-text text-darken-4">© 2019 Pawster Parents</p>
			</div>
		</div>
	</footer>
</body>
</html>
