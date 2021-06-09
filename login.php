<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to connect Agro!</title>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/login_style.css">
</head>
<body>

 <img class="wave" src="assets/images/wave.png">
 <div class="container">
      <div class="img">
			<img src="assets/images/lady.png">
		</div>
   	  <div class="login-content">
			 <form action="login.php" method="POST">
			    	<img src="assets/images/avatar.png">
				<h2 class="title">Welcome To <br> Connect Agro!</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h4>Enter Email:</h4>
           		   		<input type="email" class="input" name="log_email"   value="<?php
						if(isset($_SESSION['log_email'])) {
							echo $_SESSION['log_email'];
						}
						?>" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h4>Password</h4>
           		    	<input type="password" class="input" name="log_password"   required="">

						<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "<span style='color: #14C800;'>Email or password was incorrect</span><br>"; ?>
            	   </div>
            	</div>
					 <input type="submit" class="btn" name="login_button" value="Login">
					 <br>
					 <a href="otp.php" id="signup" class="signup">Need a account? Register here!</a>
		     </form>
   	 </div>
 </div>
 <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
