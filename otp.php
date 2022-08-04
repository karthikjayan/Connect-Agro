<?php
require 'config/config.php';

if(!empty($_POST["submit_email"])) {

	$email = strip_tags($_POST['email']); //Remove html tags
	$email = str_replace(' ', '', $email); //remove spaces

	$otp = rand(100000,999999); //generate otp
	echo $otp;

	$otp_email_query = mysqli_query($con, "SELECT * FROM otp_expiry WHERE otp_email='$email'");
	$check_otp_query = mysqli_num_rows($otp_email_query);

	if($check_otp_query == 1) {
		$update_otp = mysqli_query($con, "UPDATE otp_expiry SET otp='$otp' WHERE otp_email='$email'");

		require 'PHPMailerAutoload.php';
		$message_body = "One time password for php authentication is :<br/><br/>".$otp;

		$mail = new PHPMailer;

																// Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com;';  										// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'your_email@gmail.com';                 // SMTP username
		$mail->Password = 'pass@123';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('your_email@gmail.com', 'CONNECT AGRO');
		$mail->addAddress($_POST['email']);     // Add a recipient
		$mail->addReplyTo('your_email@gmail.com');
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->MsgHTML($message_body);

		if(!$mail->send()) {
				echo 'Message could not be sent.';
		} else {
			 header("Location: otp2.php");
		}
	}


	else if($check_otp_query == 0){
			 $query = mysqli_query($con, "INSERT INTO otp_expiry VALUES ('', '$email', '$otp')");

			 require 'PHPMailerAutoload.php';
			 $message_body = "One time password for php authentication is :<br/><br/>".$otp;

			 $mail = new PHPMailer;

			                             // Enable verbose debug output

			 $mail->isSMTP();                                      // Set mailer to use SMTP
			 $mail->Host = 'smtp.gmail.com;';  										// Specify main and backup SMTP servers
			 $mail->SMTPAuth = true;                               // Enable SMTP authentication
			 $mail->Username = 'your_email@gmail.com';                 // SMTP username
			 $mail->Password = 'pass@123';                           // SMTP password
			 $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			 $mail->Port = 587;                                    // TCP port to connect to

			 $mail->setFrom('your_email@gmail.com', 'CONNECT AGRO');
			 $mail->addAddress($_POST['email']);     // Add a recipient
			 $mail->addReplyTo('your_email@gmail.com');
			 $mail->isHTML(true);                                  // Set email format to HTML

			 $mail->MsgHTML($message_body);

			 if(!$mail->send()) {
					 echo 'Message could not be sent.';
			 } else {
					header("Location: otp2.php");
			 }
		 }
}
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
 			 <form action="otp.php" method="POST">
 			    	<img src="assets/images/avatar2.png">

 				   <h2 class="title">Verify  Email To<br> Register</h2>
            		<div class="input-div one">
            		   <div class="i">
            		   		<i class="fas fa-user"></i>
            		   </div>

            		   <div class="div">
            		   		<h4>Enter Email:</h4>
            		   		<input type="email" class="input" name="email"   value="">
            		   </div>
            		</div>

 					 <input type="submit" class="btn" name="submit_email" value="Send OTP">
					 <br>
					 <a href="login.php" id="signin" class="signin">Already have an account? sign in here!</a>
 		     </form>
    	 </div>
  </div>
  <script type="text/javascript" src="assets/js/main.js"></script>
 </body>
 </html>
