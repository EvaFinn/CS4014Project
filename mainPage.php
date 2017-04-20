<?php
  session_start();
  if(!isset($_SESSION['username'])) {header("Location: LogInPage.php");}
?>
<!DOCTYPE HTML>
<html>
	<head>
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
		<title>Welcome to DocDoc</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="style2" href="assets/css/bars/css"/>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!-- Content -->
			<div id="content">
				<div class="inner">
				<!-- Search Move to central column? Get Tags Search too-->
					<section class="box search">
						<form method="post" action="#">
							<input type="text" class="text" name="search" placeholder="Search" />
						</form>
					<form action="createTask.php">
					  <input type="submit"  value="Create Task"/>
					</form>
					</section>                    
                	<!-- Tasks sample format need to generate a list of tasks and have this format applied-->
					 <div class="boxed">
                        <div class="h_iframe">
						  <?php
                           $servername = "localhost";
                           $username = "";
                           $password = "";
                           $db_name = "docdoc"; 
                           $tbl_name = "task";
						   $currentU=$_SESSION["username"];
                           // Create connection
                             $conn = new mysqli($servername, $username, $password, $db_name);
                           // Check connection
                            if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 
			                 $sql = "SELECT task.* FROM task NATURAL JOIN task_tag NATURAL JOIN favourite_tags WHERE ul_id = '$currentU'
							 AND task_tag.tag_id IN(favourite_tags.favourite_tag_1, favourite_tags.favourite_tag_2, favourite_tags.favourite_tag_3, favourite_tags.favourite_tag_4, favourite_tags.favourite_tag_5) GROUP BY task.claimed_by,task.task_id ORDER BY task.claimed_by ASC";
			                 $result = mysqli_query($conn,$sql);
							 if(mysqli_num_rows($result)==0){
							   $sql = "SELECT * FROM `task`";
			                  $result = mysqli_query($conn,$sql);
							 }
			                 if (mysqli_num_rows($result) > 0) {
			                    while($row = mysqli_fetch_assoc($result)) {
								$isFlagged=$row["flagged"];
								$isClaimed=$row["claimed"];
								if(!($isFlagged==1)){
								if(!($isClaimed==1)){
						          echo "<div class = \"boxed\">";
				                  echo "<div class=\"h_iframe\">";
				                  echo "<h2>" . $row["task_title"]. "</h2>";
				                  echo "<p><b>Desciption:</b> " . $row["task_description"];		
							      echo "<div class=\"boxed2\">";
				                  $currentTask=$row["task_id"];
				                  $tags="SELECT tag_name FROM `task_tag` where task_id = '$currentTask'";
				                  $tresult=mysqli_query($conn,$tags);
				                  $num=mysqli_num_rows($tresult);
				                 while($trow=mysqli_fetch_array($tresult)){
				                     echo "#" ,$trow["tag_name"]. ",";
				                  }
								 $id=$_SESSION['username'];
						         echo"</div>";
                                 echo"</div>";						  
                                 echo"</div>";						  
						         echo"  <div class=\"boxed\">
	                             <a class=\"link2\" href=\"./claimTaskCode.php?task_id=$currentTask&userID=$id\"\">Claim Task </a>						 
	                             <a class=\"link2\" href=\"./viewTask.php?task_id=$currentTask\"\">View Task</a>						 
	                             <a class=\"link\" href=\"./flagTask.php?task_id=$currentTask&userID=$id\">Flag Task</a> 
                                 </div><br><br>";
															
								 }
				                }
			                  }       
							  }
                           $conn->close();
                        ?>
			        </div>
                   </div>
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
                                printf("<li class=\"current\"><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li><a href=\"./mytags.php\">Favourited Tags</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								printf("<li><a href=\"./ModTasks.php\">Moderator Tasks</a></li>");
								
				            }
                            else{
							    printf("<li class=\"current\"><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li><a href=\"./myTags.php\">Favourited Tags</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								
							}							
                           ?>   
						</ul>
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
			</div>
	</body>
</html>
