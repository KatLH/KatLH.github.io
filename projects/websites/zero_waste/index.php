<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--Google Icon Fonts-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css"> <!--Materialize CSS-->
  <link rel="stylesheet" href="css/styles.css">

	<link rel="shortcut icon" href="img/icons/icon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<title>Zero Waste - Home</title>
</head>
<body class="white">
	<!--NAVBAR-->
  <div class="topnav comfortaa nav-size" id="myTopnav">
		<a href="index.php" class="brand-logo center coiny nav-active">ZERO WASTE</a>
	  <a href="nav/crash_course.html">Crash Course</a>
	  <a href="nav/swap.html">Make The Swap</a>
	  <a href="nav/contact.php">Contact Us</a>
	  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
	    <i class="fa fa-bars"></i>
	  </a>
	</div>

  <div class="container">
		<div class="section">
      <h2 class="center flow-text ostrich-black title">THE FACTS ABOUT WASTE</h2>
		</div>
		<div class="divider"></div>

		<div class="section">
			<p class="center flow-text sintony subtitle">IN 2015</p>
		</div>

    <div class="row">
      <div class="col m12 s12">
        <div class="card-panel blue-grey lighten-5">
          <p class="center flow-text simpel paragraph"><span class="emphasis teal-text text-lighten-1 ">262.4 MILLION TONS</span><br>of trash was generated in the United States.</p>
        </div> <!--End card-content-->
      </div> <!--End col m4 s12-->
			<div class="col m6 s12">
        <div class="card-panel blue-grey lighten-5">
					<p class=" center flow-text simpel paragraph"><span class="emphasis teal-text text-lighten-1">137.7 MILLION TONS</span><br>ended up in landfills.</p>
        </div> <!--End card-content-->
      </div> <!--End col m4 s12-->
			<div class="col m6 s12">
        <div class="card-panel blue-grey lighten-5">
					<p class=" center flow-text simpel paragraph"><span class="emphasis teal-text text-lighten-1">76%</span> of food that could be composted ended up in landfills.</p>
        </div> <!--End card-content-->
      </div> <!--End col m4 s12-->
		</div> <!--End row-->

		<div class="row">
			<div class="col m4 offset-m4 s12">
				<div class="img-pad">
					<img class="img-recycle" src="img/icons/index/recycle_1.png">
				</div>
			</div>
		</div>


		<div class="section teal lighten-4 muli paragraph">
      <p class="center flow-text">It's time we make a change as a community.</p>
			<p class="center flow-text">Zero waste is about eliminating wasteful resources and finding ways to repurpose what would otherwise be thrown out.</p>
    </div>
		<div class="divider"></div>
		<br><br>

		<div class="row">
			<div class="col m12 s12">
				<h3 class="center sintony heading">Would You Like To Know More?</h3>
			</div>

			<div class="col m5 s12">
	      <div class="card">
	        <div class="card-content grey lighten-3">
		          <span class="card-title coiny subheading">Join our email list!</span>
		          <p class="muli paragraph">Get updated on all the latest news regarding the environment, along with zero waste tips, and much more!</p>
	        </div> <!--End card-content-->
	        <div class="card-action muli paragraph grey lighten-4">

						<form method="post" action="" class="blue-text text-lighten-1">
							<div class="row">
								<div class="input-field col s12">
									<input name="firstname" placeholder="First Name" type="text" class="validate">
								</div>
								<div class="input-field col s12">
									<input name="lastname" placeholder="Last Name" type="text" class="validate">
								</div>
								<div class="input-field col s12">
									<input name="email" placeholder="Email" type="email" class="validate">
								</div>
								<div class="col s12">
									<input type='submit' name='submit' value="Register" />
								</div>
							</div>
						</form>

						<?php
						include 'sql/db_connect.php';

						if($_SERVER['REQUEST_METHOD'] != 'POST')
						{

						}
						else
						{
						    $errors = array();

						    if(isset($_POST['firstname']))
						    {
						        if(!ctype_alnum($_POST['firstname']))
						        {
						            $errors[] = 'First name can only contain letters and digits.';
						        }
						        if(strlen($_POST['lastname']) > 30)
						        {
						            $errors[] = 'First name cannot be longer than 30 characters.';
						        }
						    }
						    else
						    {
						        $errors[] = 'field must not be empty.';
						    }


						    if(isset($_POST['lastname']))
						    {
						        if(!ctype_alnum($_POST['lastname']))
						        {
						            $errors[] = 'Last name can only contain letters and digits.';
						        }
						        if(strlen($_POST['lastname']) > 30)
						        {
						            $errors[] = 'Last name cannot be longer than 30 characters.';
						        }
						    }
						    else
						    {
						        $errors[] = 'field must not be empty.';
						    }

						    if(!empty($errors))
						    {
						        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
						        echo '<ul>';
						        foreach($errors as $key => $value)
						        {
						            echo '<li>' . $value . '</li>';
						        }
						        echo '</ul>';
						    }

						    else if(isset($_POST['submit']))
						    {
						        $first = $_POST['firstname'];
						        $last = $_POST['lastname'];
						        $email = $_POST['email'];

						        $sql = "INSERT INTO mailing_list (firstname, lastname, email)
						                VALUES('$first','$last','$email')";

						        $result = mysqli_query($connection, $sql);
						        if(!$result)
						        {

						            echo 'Something went wrong while registering. Please try again later.';
						            //echo mysqli_error($connection);
						        }
						        else
						        {
						            echo 'Successfully registered';
						        }
						    }
						}

						?>

					</div> <!--End card-action-->
				</div> <!--End card-->
	    </div>

	    <div class="col m6 offset-m1 s12">
	      <div class="card-panel grey lighten-5">
	        	<a href="nav/crash_course.html"><span class="coiny subheading">Zero Waste Crash Course</span></a>
	        	<p class="muli paragraph">Learn all about waste and the impact our choices have on this earth by checking out our crash course on materials, waste, and recycling.</p>
	      </div> <!--End card-panel-->
	    </div>

			<div class="col m6 offset-m1 s12">
				<div class="img-pad">
					<img class="img-bag" src="img/icons/index/blue_bag.png">
				</div>
			</div>

	  </div> <!--End row-->
	</div> <!--End container-->


	<!--FOOTER-->
  <footer class="page-footer indigo darken-4 muli footer">
    <div class="container">
      <div class="row">
        <div class="col m4 offset-m1 s6">
          <h5 class="white-text coiny">Don't Waste Today</h5>
          <ul>
						<li><a class="grey-text text-lighten-3" href="index.php">Home</a></li>
						<li><a class="grey-text text-lighten-3" href="nav/crash_course.html">Crash Course</a></li>
            <li><a class="grey-text text-lighten-3" href="nav/swap.html">Make The Swap</a></li>
          </ul>
        </div> <!--End col l4 s12-->

        <div class="col m4 offset-m2 s12">
          <a href="nav/contact.html"><h5 class="white-text coiny">Contact Us</h5></a>
          <p class="grey-text text-lighten-4">1234 5th Ave<br>Orlando, FL 67890</p>
          <p class="grey-text text-lighten-4">(123) 456 - 7890</p>
        </div> <!--End col l6 s12-->
      </div> <!--End row-->
    </div> <!--End container-->

    <div class="footer-copyright">
      <div class="container">
        <p class="center">© 2019 Zero Waste</p>
        <a class="grey-text text-lighten-4 right" href="#"></a>
      </div> <!--End container-->
    </div> <!--End footer-copyright-->
  </footer>
	<!--END FOOTER-->

<!--JAVASCRIPT-->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> <!--jQuery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script> <!--Materialize JS-->
  <script src="js/script.js"></script>
</body>
</html>
