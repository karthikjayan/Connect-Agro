<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
 ?>

<html>
<head>
	<title>Welcome to Connectagro!</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
</head>
<body>
	<img class="wave" src="assets/images/wave.png">
	 <div class="register_box">
			<div class="reg_img">
			    	<img src="assets/images/bg.SVG">
			</div>
			<div class="reg-content">
		  		<form action="register.php" method="POST">
							<h2>Register Here!</h2>


							<div class="inputbox one">
								<div class="i">
           		   		<i class="fas fa-user"></i>
           		  </div>
								<div class="div">
									<h5>First Name:</h5>
									<input class="input" type="text" name="reg_fname" placeholder="" value="<?php
										if(isset($_SESSION['reg_fname'])) {
											echo $_SESSION['reg_fname'];
										}
									?>" required>
								</div>
								<br>
								<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "<span style='color: #14C800;'>Your first name must be between 2 and 25 characters</span><br>"; ?>
						 </div>


						 <div class="inputbox one">
							 <div class="i">
									 <i class="fas fa-user"></i>
							 </div>
							 <div class="div">
								 	<h5>Last Name:</h5>
									<input class="input" type="text" name="reg_lname" placeholder="" value="<?php
									if(isset($_SESSION['reg_lname'])) {
										echo $_SESSION['reg_lname'];
									}
									?>" required>
							 </div>
									<br>
									<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "<span style='color: #14C800;'>Your last name must be between 2 and 25 characters</span><br>"; ?>
			    		</div>


							<div class="inputbox one">
								<div class="i">
										<i class="fas fa-user"></i>
								</div>
								<div class="div">
									<h5>Email:</h5>
							 	  <input class="input" type="email" name="reg_email" placeholder="" value="<?php
								    if(isset($_SESSION['reg_email'])) {
									   echo $_SESSION['reg_email'];
								    }
								  ?>" required>
							 </div>
								<br>
							</div>


              <div class="inputbox one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                  <h5>Confirm Email:</h5>
                  <input class="input" type="email" name="reg_email2"  placeholder="" value="<?php
                    if(isset($_SESSION['reg_email2'])) {
                     echo $_SESSION['reg_email2'];
                    }
                  ?>" required>
               </div>
                <br>
                <?php if(in_array("Email already in use<br>", $error_array)) echo "<span style='color: #14C800;'>Email already in use</span><br>";
                  else if(in_array("Invalid email format<br>", $error_array)) echo "<span style='color: #14C800;'>Invalid email format</span><br>";
                  else if(in_array("Emails don't match<br>", $error_array)) echo "<span style='color: #14C800;'>Emails don't match</span><br>";
                ?>
              </div>

							<div class="inputbox pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
								    <input class="input" type="password" name="reg_password" placeholder="" >
								 </div>
								<br>
							</div>


							<div class="inputbox pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password:</h5>
										<input class="input" type="password" name="reg_password2" placeholder="" >
								</div>
								<br>
								<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "<span style='color: #14C800;'>Your passwords do not match</span><br>";
									else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "<span style='color: #14C800;'>Your password can only contain english characters or numbers</span><br>";
									else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "<span style='color: #14C800;'>Your password must be betwen 5 and 30 characters</span><br>";
									?>
							</div>


							<div class="submit">
								<input type="submit" class="btn" name="register_button" value="Register">

								<br>

								<?php if(in_array("You're all set! Goahead and login!<br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
									<a href="login.php" id="signin" class="signin">Already have an account? sign in here!</a>
							</div>

					</form>
			</div>
		</div>
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
