<!DOCTYPE html>
<html>
<link rel="stylesheet" href="assets/css/login.css"/>
<link rel="stylesheet" href="assets/css/bars.css"/>
<head>
 <div class="topnav" id="myTopnav">
           <a href="FAQ.php">FAQ</a>           
        </div>
</head>
<body>
  <body>  
	<div class="container">
	  <section id="content">
       <form action="insertUser.php" method="POST">
	     <h1> Registation Form </h1>
		    <div>
                 <input type="text" name="email" pattern="[0-9.-_]{6,9}@(studentmail.ul.ie|ul.ie)" placeholder="Enter your email" required>
		    </div>
		    <div>
                 <input type="text" placeholder="UL ID Number" pattern="[0-9]{6,9}" name="IDnum" required>
            </div>
			<div>
	             <input type="text" placeholder="name" name="firstName" required>
			</div>
            <div>
	             <input type="text" placeholder="surname" name="lastName" required> 
		    </div>
			<div>
			     <input type="text" placeholder="Field Of Study" name="field" required>
		    </div>
			<div>
	             <input type="submit" value="Register" name="register">
				 <a href="LogInPage.php">Cancel</a>
		    </div>
       </form>
	  </section><!-- content -->
    </div><!-- container -->
  </body>
</body>
</html>
