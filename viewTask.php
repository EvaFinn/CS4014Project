<?php
  session_start();
  if(!isset($_SESSION['username'])) {header("Location: LogInPage.php");}
?>
<!DOCTYPE html>
<html >
<head>
<title>View Task</title>
<link rel="stylesheet" href="assets/css/main.css"/>
<div class="topnav" id="myTopnav">
           <?php
		      if (isset($_SESSION["username"]) && $_SESSION["username"] != ''){/* NEED TO FIX SO LOGGED IN USER IS SET*/ 
                 printf("<a href=\"./LogOut.php\"> Log Out</a>");
                 printf("<a href=\"./UserProfile.php\">Profile</a>");
                 printf("<a href=\"./FAQ.php\">FAQ</a>");
				}	
            ?>       
</div>
</head>
<body>
		<div id="content">
				<div class="inner">
				<h2> Task's Information </h2>
				<?php
                $servername = "localhost";
                $username = "";
                $password = "";
                $db_name = "docdoc"; 
                $tbl_name = "task";
				$currentT= $_GET['task_id'];
                // Create connection
               $conn = new mysqli($servername, $username, $password, $db_name);
               // Check connection
               if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
              } 
			   $sql = "SELECT * FROM `task` WHERE task_id='$currentT'";
			   $result = mysqli_query($conn,$sql);
			   if (mysqli_num_rows($result) > 0) {
			     while($row = mysqli_fetch_assoc($result)) {
			
				   echo "<div class=\"boxed\">";
				   echo "<h2>" . $row["task_title"]. "</h2>";
				   echo  "</div>";
				   echo "<div class = \"boxed\">";
				   echo "<p><b>Desciption: </b>" . $row["task_description"]."</p>";
	               echo "<p><b>Pages: </b> ".$row["task_pages"]."</p>";		
	               echo "<p><b>Word Count:</b> ".$row["task_words"]."</p>";		
				   echo "<p><b>Format:</b> ".$row["task_format"]."</p>";
				   echo "<p><b>Due:</b> ".$row["submit_by"]."</p>";		
                   echo "</div>";				   
                 				   
				 }
			   }       
             $conn->close();
             ?> <!--Change so the user cannot claim task if it is their task-->
			    <a href="#" onclick="history.go(-1);">Back</a>  
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
                                printf("<li class=\"current\"><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								printf("<li><a href=\"./ModTasks.php\">Moderator Tasks</a></li>");
								
				            }
                            else{
							    printf("<li class=\"current\"><a href=\"./mainPage.php\">Home</a></li>");
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
										<td><span>6</span></td>
										<td><span>7</span></td>
										<td><span>8</span></td>
										<td><span>9</span></td>
										<td><a href="#">10</a></td>
									</tr>
									<tr>
										<td><span>11</span></td>
										<td><span>12</span></td>
										<td><span>13</span></td>
                                        <td><span>14</span></td>
										<td><span>15</span></td>
										<td><span>16</span></td>
										<td><span>17</span></td>
									</tr>
									<tr>
										<td><span>18</span></td>
										<td><span>19</span></td>
									  	<td class="today"><a href="#">20</a></td>
										<td><span>21</span></td>
										<td><span>22</span></td>
										<td><span>23</span></td>
										<td><span>24</span></td>
									</tr>
									<tr>
										<td><span>25</span></td>
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
