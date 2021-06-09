<?php
require 'config/config.php';

if(!empty($_POST["submit_otp"])) {

$email= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['email'] = $email; //Store email into session variable

	$otpchk = strip_tags($_POST['ent_otp']); //Remove html tags
	$otpchk = str_replace(' ', '', $otpchk); //remove spaces
	 $_SESSION['ent_otp'] = $otpchk; //Stores otp into session variable


	 	$check_database_query = mysqli_query($con, "SELECT * FROM otp_expiry WHERE otp_email='$email' AND otp='$otpchk'");
	 	$check_login_query = mysqli_num_rows($check_database_query);

  if($check_login_query == 1) {
	  header("Location: register.php");
		$_SESSION['ent_otp'] = "";
  }
	else {
		echo "wrong otp";
	}
}
$_SESSION['email'] = "";
$_SESSION['ent_otp'] = "";
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Register to connect Agro!</title>
 	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="assets/css/login_style.css">
 </head>
 <body>

  <img class="wave" src="assets/images/wave.png">

  <div class="container">
       <div class="img">
 				<img src="assets/images/otp1.jpg">
 		   </div>
    	 <div class="login-content">
 			 <form action="otp2.php" method="POST">
 			    	<img src="assets/images/avatar2.png">

 				   <h2 class="title">Validate otp To<br> Register</h2>

					 <div class="input-div one">
							<div class="i">
								 <i class="fas fa-user"></i>
							</div>

							<div class="div">
								 <h4>Enter Email:</h4>
								 <input type="email" class="input" name="email"   value="">
							</div>
					 </div>

					 <div class="input-div one">
							<div class="i">
								 <i class="fas fa-user"></i>
							</div>
							<div class="div">
								 <h4>Enter OTP:</h4>
								 <input type="password" class="input" name="ent_otp"   value="" >
							</div>
					 </div>

					 <input type="submit" class="btn" name="submit_otp" value="Verify OTP">
					 <br>
           <a href="login.php" id="signup" class="signup">Already have an account? Login Here!</a>
 		     </form>
    	 </div>
  </div>
  <script type="text/javascript" src="assets/js/main.js"></script>
 </body>
 </html>
