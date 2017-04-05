<?php session_start(); ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome to Doc Doc </title>
      <link rel="stylesheet" href="assets/css/login.css">
</head>
 <body>
 <div class="container">
	<section id="content">
		<form method="post" action="checkLogin.php">
			<h1>Login Form</h1> 
			
			<div>
				<input name= "ul_id" type="id" placeholder="ID" pattern="[0-9]{8}" required="" id="ul_id" />
			</div>
			<div>
				<input name="password" type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>			   
				<input name="login" type="submit" value="Log in" />
				<a href="LostPassword.html">Lost your password?</a>
				<a href="RegistrationForm.html">Register</a>
			</div>
		</form><!-- form -->		
	</section><!-- content -->
</div><!-- container -->
<script src="js/index2.js"></script>
</body>
</html>
