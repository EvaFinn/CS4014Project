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
       <form action="Validation.php"> <!-- once registered will direct to validation page -->
	     <h1> Registation Form </h1>
		    <div>
                 <input type="email" name="email" pattern="[0-9]{6,7,8,9}@(studentmail.ul.ie|ul.ie)" placeholder="Enter your email" required>
		    </div>
		    <div>
                 <input type="text" placeholder="UL ID Number" required>
            </div>
			<div>
	             <input type="text" placeholder="name">
			</div>
            <div>
	             <input type="text" placeholder="surename"> 
		    </div>
			<div>
			     <input type="text" placeholder="Field Of Study">
		    </div>
			<div>
	             <input type="submit" value="Register">
				 <a href="LogInPage.php">Cancel</a>
		    </div>
       </form>
	  </section><!-- content -->
    </div><!-- container -->
  </body>
  <script src="js/index2.js"></script>
</body>
</html>
