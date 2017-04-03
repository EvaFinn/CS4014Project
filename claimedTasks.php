<?php
  session_start();
  if(!isset($_SESSION['username'])) {header("Location: LogInPage.php");}
?>
<!DOCTYPE html>
<html >
<head>
<title>Claimed Tasks</title>
<link rel="stylesheet" href="assets/css/main.css"/>
<div class="topnav" id="myTopnav">
          <?php
		      if (isset($_SESSION["username"]) && $_SESSION["username"] != ''){
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
				<h2> Tasks for review</h2>
			    <h1> Warning, cancelling tasks or failing to review tasks before deadline will reduce user reputation</h1>
           <!--   <div>   if (!(isset($success_message))) {echo "Unexpected error, please try again";}
                   else { echo  "Task sucessfully deleted";}   php not working atm
			  </div>-->
				<div class="boxed"> 
				<?php
				 $userID = $_SESSION['username'];
                 $servername = "localhost";
                 $username = "root";
                 $password = "softwarepro";
                 $db_name = "docdoc"; 
                 // Create connection
                 $conn = new mysqli($servername, $username, $password, $db_name);
                // Check connection
               if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }    
             	 $sql = "SELECT * FROM `task` NATURAL JOIN `claimed_tasks` where task.claimed = '1' AND claimed_tasks.hidden_id = $userID";
				 $result = mysqli_query($conn,$sql);
              	 while($row = mysqli_fetch_array($result))
                 { 
				  echo "<h1>" . $row["task_title"]. "</h1>";
				  echo "<p>Desciption: " . $row["task_description"].
				  "<br>Pages: ".$row["task_pages"]."</p>";
				  echo"<p>Word Count:".$row["task_words"]."</p>";		
				  echo"<p>Task ID:".$row["task_id"]."</p>";		
                  echo "<div class=\"boxed2\">";
				  $currentTask=$row["task_id"];
				   $tags="SELECT tag_name FROM `task_tag` where task_id = $currentTask";
				   $tresult=mysqli_query($conn,$tags);
				   $num=mysqli_num_rows($result);
				   while($trow=mysqli_fetch_array($tresult)){
				      echo "#" ,$trow["tag_name"]. ",";
				   }
				  echo" </div>
                        <div class=\"boxed\">
						  <a href=\"./cancelTask.php?task_id=$currentTask\"> Cancel Task</a>
						  <a href=\"./viewTask.php?task_id=$currentTask\"> View Task</a> 
						  <a href=\"\"> Request File</a>	           
                        </div></br>";						
                 }				 
			    
                $conn->close();
                 ?>
                         </div>
					
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
                                printf("<li class=\"current\"><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								printf("<li><a href=\"./ModTasks.php\">Moderator Taks</a></li>");
								
				            }
                            else{
							    printf("<li ><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li class=\"current\"><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
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
