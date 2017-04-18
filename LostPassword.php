<!DOCTYPE html>
<html >
<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="assets/css/bars.css">
<title>Password Recovery</title>
<body>
<div class="container">
	<section id="content">
         <form action="emailSuccess.php">
             <h1>Recovery</h1>
			 <p> Please enter your registered email to recover your password.</p>
			 <p> An email will be sent to your email address to recover your password</p>
             <input type="email" name="email" pattern="[0-9.-_]{6,9}@(studentmail.ul.ie|ul.ie)" placeholder="Enter your email" required>
			 <div>
             <input type="submit" value="Send Email">
			 <a href="LogInPage.php">Cancel</a>
			 </div>
        </form>
    </section>
</div>
</body>
</html>
