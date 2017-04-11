<?php
  session_start();
  if(!isset($_SESSION['username'])) {header("Location: LogInPage.php");}
?>
<!DOCTYPE html>
<html >
<head>
<title>User Profile</title>
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/sampProfile.css"/>
<div class="topnav" id="myTopnav">
           <?php
		      if (isset($_SESSION["username"]) && $_SESSION["username"] != ''){
			     $currentU=$_SESSION["username"];
                 printf("<a href=\"./LogOut.php\"> Log Out</a>");
                 printf("<a href=\"./UserProfile.php?userid=$currentU\">My Profile</a>");
                 printf("<a href=\"./FAQ.php\">FAQ</a>");
				}	
            ?>       
</div>
</head>
<body>
    <div id="content">
   	    <div class="inner">	
		  <?php
                $servername = "localhost";
                $username = "root";
                $password = "softwarepro";
                $db_name = "docdoc";          
				$userProfile = $_GET['userid'];
				$currentU=$_SESSION["username"];
                // Create connection
               $conn = new mysqli($servername, $username, $password, $db_name);
               // Check connection
               if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
              } 
			   $sql = "SELECT * FROM user WHERE ul_id='$userProfile'";
			   $result = mysqli_query($conn,$sql);
			   if (mysqli_num_rows($result) > 0) {
			     while($row = mysqli_fetch_assoc($result)) {
				   $isMod=$row["is_moderator"];
			       
				   echo "<div class=\"tab\">";
				   echo " <img src=\"images/images.png\" alt=\"\" id=\"profile\"></a>";
				   echo  "<h1> User Name: ".$row["first_name"]." ".$row["last_name"]."</h1>";
				   if($isMod==1){
				   echo "<h3>Moderator</h3>";}
				   echo "</div>";
				   echo " <div class=\"main\">";
				   if($userProfile == $currentU){
	               echo " <a href=\"editProfile.php\"> Edit Profile</a>";		
	               echo " <a href=\"changePassword.php\"> Change Password</a>";		
				   }
	               echo "  <h1> About User: </h1>";		
				   echo "<table class=\"info\">";
				   echo "<tr>";		
                   echo "<td><h2>Happiness Points:</h2></td><td>".$row["reputation"]."</td>";		  
				   echo "</tr>";				   
                   echo "<tr><td><h2>Field of Study:</h2></td> <td>".$row["field"]."</td>";				   
                   echo "</tr><tr><td><h2>Contact Email:</h2></td><td>".$row["ul_email"]."</td>";				   
                   echo "</tr></table>";	
  				   echo "</div>";
				 }
			   }       
             $conn->close();
			 ?>   
		</div>
	</div>
	<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="mainPage.php"></a></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
						 <?php			   
                             if (isset($_SESSION["username"]) && $_SESSION["username"] != '' && $_SESSION["is_moderator"]==1){ 
                                printf("<li><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								printf("<li><a href=\"./ModTasks.php\">Moderator Tasks</a></li>");
								
				            }
                            else{
							    printf("<li><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								
							}							
                           ?>  
						</ul>
					</nav>
					<section class="box calendar">
						<div class="inner">
							<table>
								<caption>March 2017</caption>
								<thead>
									<tr>
										<th scope="col" title="Monday">M</th>
										<th scope="col" title="Tuesday">T</th>
										<th scope="col" title="Wednesday">W</th>
										<th scope="col" title="Thursday">T</th>
										<th scope="col" title="Friday">F</th>
										<th scope="col" title="Saturday">S</th>
										<th scope="col" title="Sunday">S</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="4" class="pad"><span>&nbsp;</span></td>
										<td><span>1</span></td>
										<td><span>2</span></td>
										<td><span>3</span></td>
									</tr>
									<tr>
										<td><span>4</span></td>
										<td><span>5</span></td>
										<td><a href="#">6</a></td>
										<td><span>7</span></td>
										<td><span>8</span></td>
										<td><span>9</span></td>
										<td><a href="#">10</a></td>
									</tr>
									<tr>
										<td><span>11</span></td>
										<td><span>12</span></td>
										<td><span>13</span></td>
										<td class="today"><a href="#">14</a></td>
										<td><span>15</span></td>
										<td><span>16</span></td>
										<td><span>17</span></td>
									</tr>
									<tr>
										<td><span>18</span></td>
										<td><span>19</span></td>
										<td><span>20</span></td>
										<td><span>21</span></td>
										<td><span>22</span></td>
										<td><a href="#">23</a></td>
										<td><span>24</span></td>
									</tr>
									<tr>
										<td><a href="#">25</a></td>
										<td><span>26</span></td>
										<td><span>27</span></td>
										<td><span>28</span></td>
										<td class="pad" colspan="3"><span>&nbsp;</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
   <script src="assets/js/sampJS.js"></script>
</body>
</html>
