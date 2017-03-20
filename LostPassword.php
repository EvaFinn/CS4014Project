<!DOCTYPE html>
<html >
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="assets/css/bars.css">
<head>
<div class="topnav" id="myTopnav">
           <a href="FAQ.php">FAQ</a>           
</div>
</head>
<body>
<div class="container">
	<section id="content">
         <form action="#"><!--Need to get functionality implemented with this-->
             <h1>Recovery</h1>
			 <p> Please enter your registered email to recover your password.</p>
			 <p> An email will be sent to your email address to recover your password</p>
             <input type="email" name="email" pattern="[0-9]{6,7,8,9}@(studentmail.ul.ie|ul.ie)" placeholder="Enter your email" required>
			 <div>
             <input type="submit" value="Send Email">
			 <a href="LogInPage.php">Cancel</a>
			 <a href="LostPassword.php">Re-Send Email</a>
			 </div>
        </form>
    </section>
</div>
</body>
</html>