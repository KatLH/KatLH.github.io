<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="../img/icons/icon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<title>Zero Waste - Contact</title>
<!--CSS-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--Google Icon Fonts-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css"> <!--Materialize CSS-->
  <link rel="stylesheet" href="../css/styles.css"> <!--Custom CSS-->
<!--Meta data-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="white"> <!--Alt Color: lime lighten-5-->
	<div class="topnav comfortaa nav-size" id="myTopnav">
		<a href="../index.php" class="brand-logo center coiny">ZERO WASTE</a>
	  <a href="../nav/crash_course.html">Crash Course</a>
	  <a href="../nav/swap.html">Make The Swap</a>
	  <a href="../nav/contact.php" class="nav-active">Contact Us</a>
	  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
	    <i class="fa fa-bars"></i>
	  </a>
	</div>

	<div class="container muli">
		<div class="section">
      <h2 class="center flow-text ostrich-black title">CONTACT US</h2>
		</div>
		<div class="divider"></div><br>

		<div class="row">
			<div class="col m4 offset-m4 s12">
				<div class="img-pad">
					<img class="img-recycle" src="../img/icons/index/recycle_1.png">
				</div>
			</div>
		</div>
		<br>

		<div class="row">
    <form name="contactform" method="POST" action="" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="first_name" placeholder="First Name *" id="first_name" type="text" data-length="50" class="validate">
        </div>
        <div class="input-field col s6">
          <input name="last_name" placeholder="Last Name *" id="last_name" type="text" class="validate">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input name="email" placeholder="Email *" id="email" type="email" class="validate">
        </div>
				<div class="input-field col s6">
          <input name="telephone" placeholder="Phone" id="phone" type="text" class="validate">
        </div>
      </div>
			<div class="row">
          <div class="input-field col s12">
            <textarea name="comments" placeholder="Type here..." id="textarea2" class="materialize-textarea" data-length="120"></textarea>
            <label for="textarea2">Comments</label>
          </div>
        </div>
			<input type="submit" value="Submit">
    </form>
  </div>
	<br><br>


		<?php
		if(isset($_POST['email'])) {
		    $email_to = "hurstk10@knights.ucf.edu";
		    $email_subject = "Zero Waste - Contact Us";

		    function died($error) {
		        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
		        echo "These errors appear below.<br /><br />";
		        echo $error."<br /><br />";
		        echo "Please go back and fix these errors.<br /><br />";
		        die();
		    }


		    if(!isset($_POST['first_name']) ||
		        !isset($_POST['last_name']) ||
		        !isset($_POST['email']) ||
		        !isset($_POST['telephone']) ||
		        !isset($_POST['comments'])) {
		        died('We are sorry, but there appears to be a problem with the form you submitted.');
		    }



		    $first_name = $_POST['first_name']; // required
		    $last_name = $_POST['last_name']; // required
		    $email_from = $_POST['email']; // required
		    $telephone = $_POST['telephone']; // not required
		    $comments = $_POST['comments']; // required

		    $error_message = "";
		    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

		  if(!preg_match($email_exp,$email_from)) {
		    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
		  }

		    $string_exp = "/^[A-Za-z .'-]+$/";

		  if(!preg_match($string_exp,$first_name)) {
		    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
		  }

		  if(!preg_match($string_exp,$last_name)) {
		    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
		  }

		  if(strlen($comments) < 2) {
		    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
		  }

		  if(strlen($error_message) > 0) {
		    died($error_message);
		  }

		    $email_message = "Form details below.\n\n";


		    function clean_string($string) {
		      $bad = array("content-type","bcc:","to:","cc:","href");
		      return str_replace($bad,"",$string);
		    }



		    $email_message .= "First Name: ".clean_string($first_name)."\n";
		    $email_message .= "Last Name: ".clean_string($last_name)."\n";
		    $email_message .= "Email: ".clean_string($email_from)."\n";
		    $email_message .= "Telephone: ".clean_string($telephone)."\n";
		    $email_message .= "Comments: ".clean_string($comments)."\n";

		// create email headers
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		mail($email_to, $email_subject, $email_message, $headers);
		?>

		Thank you for contacting us. We will be in touch with you very soon.

		<?php

		}
		?>
	</div> <!--End container-->


	<!--FOOTER-->
  <footer class="page-footer indigo darken-4 muli footer">
    <div class="container">
      <div class="row">
        <div class="col m4 offset-m1 s6">
          <h5 class="white-text coiny">Header</h5>
          <ul>
						<li><a class="grey-text text-lighten-3" href="../index.php">Home</a></li>
						<li><a class="grey-text text-lighten-3" href="../nav/crash_course.html">Crash Course</a></li>
            <li><a class="grey-text text-lighten-3" href="../nav/swap.html">Make The Swap</a></li>
          </ul>
        </div> <!--End col l4 s12-->

        <div class="col m4 offset-m2 s12">
          <a href="../nav/contact.html"><h5 class="white-text coiny">Contact Us</h5></a>
          <p class="grey-text text-lighten-4">1234 5th Ave<br>Orlando, FL 67890</p>
          <p class="grey-text text-lighten-4">(123) 456 - 7890</p>
        </div> <!--End col l6 s12-->
      </div> <!--End row-->
    </div> <!--End container-->

    <div class="footer-copyright">
      <div class="container">
        <p class="center">© 2019 Zero Waste</p>
        <a class="grey-text text-lighten-4 right" href="#">link</a>
      </div> <!--End container-->
    </div> <!--End footer-copyright-->
  </footer>
	<!--END FOOTER-->

<!--JAVASCRIPT-->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> <!--jQuery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script> <!--Materialize JS-->
  <script src="../js/script.js"></script>
</body>
</html>
