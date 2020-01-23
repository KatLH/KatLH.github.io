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

	<title>Pawster Parents</title>
</head>
<body class="">
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
		<div id="main" class="container">
			<?php
			if(!isset($_SESSION['loggedin']))
			{ ?>
				<br><br><br>
				<div class="container">
					<div class="row">
						<div class="col s12">
							<div id="loginResponse">
								<div class="col s12 m4 offset-m5">
									<div id="loading"></div>
									<div id="response"></div>
									<br><br>
								</div> <!--End col s12 m4 offset-m5-->
								
								<!--LOGIN FORM-->
								<div id="loginResponse">
								<div class="col s12 m6">
									<form class="mintk" id="login" action="SQL_users/login.php" method="POST">
										<h2 class="center thinpaws">Log In</h2>
										<div class="row">
											<div class="input-field col s12">
												<input type="text" class="validate" name="username">
												<label for="username">Username</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input type="password" class="validate" name="password">
												<label for="password">Password</label>
											</div>
										</div>
										<input type="submit" name="submit" value="Login">
										<br><br>
									</form>
								</div> <!--End col s12 m6-->
						
								<!--REGISTER FORM-->
								<div class="col s12 m6">
									<form id="register" class="col s12 mintk" action="SQL_users/register.php" method="POST">
										<h2 class="center thinpaws">Register</h2>
										<div class="row">
											<div class="input-field col s6">
												<input type="text" class="validate" name="firstname">
												<label for="first_name">First Name</label>
											</div>
											<div class="input-field col s6">
												<input type="text" class="validate" name="lastname">
												<label for="last_name">Last Name</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input type="text" class="validate" name="username">
												<label for="username">Username</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input type="password" class="validate" name="password">
												<label for="password">Password</label>
											</div>
										</div>
										<input type="submit" name="submit" value="Register">
										<br><br>
									</form>
								</div> <!--End s12 m6-->
							</div> <!--End loginResponse-->
						</div> <!--End col s12-->
					</div> <!--End row-->
				</div> <!--End container-->
				<?php
			} else
			{ ?>
				<div class="section blue-text text-darken-1">
					<p class="heading center gorditas">Fostering saves millions of lives!</p>
				</div>

				<div class="row grey lighten-4">
					<br>
					<div class="col s4">
						<img class="responsive-img" src="img/stock/kitten.jpg" alt="Tabby kitten">
						<p class="blue-grey-text text-darken-4 center open-sans-Bold">Give a pawster animal a chance of a lifetime!</p>
					</div>
					<div class="col s4">
						<img class="responsive-img" src="img/stock/dog_yawning.jpg" alt="A happy dog">
						<p class="blue-grey-text text-darken-4 center open-sans-Bold">Help animals find their forever home.</p>
					</div>
					<div class="col s4">
						<img class="responsive-img" src="img/stock/cat_eyes_closed.jpg" alt="Cat closing its eyes">
						<p class="blue-grey-text text-darken-4 center open-sans-Bold">Change a Pawster Animal's life!</p>
					</div>
				</div>

				<div class="row grey lighten-4">
					<br>
					<div class="col s12 m3">
						<img class="responsive-img" src="img/playtime/run.jpg" alt="Dog running after ball">
					</div>
					<div class="col s12 m3">
						<img class="responsive-img" src="img/playtime/chase.jpg" alt="Dog chasing after ball">
					</div>
					<div class="col s12 m3">
						<img class="responsive-img" src="img/playtime/catch.jpg" alt="Dog catching ball">
					</div>
					<div class="col s12 m3">
						<img class="responsive-img" src="img/playtime/dive.jpg" alt="Dog diving after ball">
						<p class="blue-grey-text text-darken-4 center open-sans-Bold">Be a friend to those in need.</p>
					</div>
				</div>

				<br><br>
				<div class="divider"></div>
				<br><br>
				<div class="row">
					<div class="col s12 m4">
						<p class="blue-text text-darken-1 open-sans-Bold">Thinking about becoming a Pawster Parent?</p>
					</div>
					<div class="col s12 m2 offset-m1">
						<img class="responsive-img" src="img/stock/cat_playing_with_yarnLARGE.png" alt="Cat playing with yarn">
					</div>
					<div class="col s12 m4 offset-m1">
						<p class="blue-grey-text text-darken-3 open-sans-Bold">Contact your local animal shelter for more details and start saving lives!</p>
					</div>
				</div> <!--End row-->
			<?php } ?>
		</div> <!--End container/main-->
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
