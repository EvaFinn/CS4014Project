<?php
  session_start();
  if(!isset($_SESSION['username'])) {header("Location: LogInPage.php");}
?>
<!DOCTYPE html>
<html >
<head>
<title>Request File</title>
<link rel="stylesheet" href="assets/css/main.css"/>
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
	<h2>Request File </h2>
	<p> Send email requesting file to task owner?</p>
	<?php	
	$currentT=$_GET["task_id"];
	$currentUser=$_SESSION["username"];
	$host = "localhost"; 
    $username = "";
    $password = ""; 
    $db_name = ""; 
    $conn = new mysqli($host, $username, $password, $db_name);
   if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 	
    $sql="SELECT * from user_task NATURAL JOIN user WHERE task_id='$currentT'"		;					  
    $res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	$email = $row["ul_email"];
	echo "<h3>Please make use of the sample email format shown below.</h3>"; 
	echo "<TEXTAREA ID=\"holdtext\">";
	echo "Task owner email: $email";
    echo "\n";
    echo "Dear Task Owner, I would like to request the file for task: $currentT. To review the task as indicated.";
	echo "Regards,$currentUser";	
    echo"</TEXTAREA>";
	echo"</br>";
	echo "<form action=\"./sendEmailRequest.php?task_id=$currentT\" method=\"post\">";
    echo "<input type=\"submit\" value=\"Send email\" />";
    echo "</form>";
	?>
		  <a class= "link2" href="#" onclick="history.go(-1);">Back</a>  
	</div>
  </div>
<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="mainPage.php"></a></h1>

				<!-- Nav -->
					<nav id="nav">
						 <?php			   
                             if (isset($_SESSION["username"]) && $_SESSION["username"] != '' && $_SESSION["is_moderator"]==1){ 
                                printf("<li><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li><a href=\"./mytags.php\">Favourited Tags</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								printf("<li><a href=\"./ModTasks.php\">Moderator Tasks</a></li>");
								
				            }
                            else{
							    printf("<li><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li><a href=\"./myTags.php\">Favourited Tags</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								
							}							
                           ?>   
					</nav>

				<!-- Calendar Do we need? might be useful -->
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
</body>
</html>
