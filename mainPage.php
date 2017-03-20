<?php
/*if(!isset($_SESSION['login'])) { //if login in session is not set
    header("Location: LogInPage.php");
}*/
?>
<!DOCTYPE HTML>
<html>
	<head>
	    <div class="topnav" id="myTopnav">
		 <?php
		    /* if (isset($_SESSION["ul_id"]) && $_SESSION["ul_id"] != ''){/* NEED TO FIX SO LOGGED IN USER IS SET*/ 
                 printf("<a href=\"./LogOut.php\"> Log Out</a>");
                 printf("<a href=\"./UserProfile.php\">Profile</a>");
                 printf("<a href=\"./FAQ.php\">FAQ</a>");
				/*}	*/	
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
                           $username = "root";
                           $password = "softwarepro";
                           $db_name = "docdoc"; 
                           $tbl_name = "task";
                           // Create connection
                             $conn = new mysqli($servername, $username, $password, $db_name);
                           // Check connection
                            if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 
			                 $sql = "SELECT * FROM `task`";
			                 $result = mysqli_query($conn,$sql);
			                 if (mysqli_num_rows($result) > 0) {
			                    while($row = mysqli_fetch_assoc($result)) {
						          echo "<div class = \"boxed\">";
				                  echo "<div class=\"h_iframe\">";
				                  echo "<h1>" . $row["task_title"]. "</h1>";
				                  echo "<p>Desciption: " . $row["task_description"].
								  "<br>Pages: ".$row["task_pages"]."</p>";		
							      echo "	 <div class=\"boxed2\">";
						          $currentTask=$row["task_id"];
				                  $tags="SELECT tag_name FROM `task_tag` where task_id = $currentTask";
				                  $tresult=mysqli_query($conn,$tags);
				                  $num=mysqli_num_rows($result);
				                  $trow=mysqli_fetch_array($tresult,MYSQLI_ASSOC);
				                  while($trow=mysqli_fetch_array($tresult, MYSQLI_ASSOC)){
				                  echo "#" ,$trow["tag_name"]. ",";
				                 }
						         echo"</div>";
                                 echo"</div>";						  
                                 echo"</div>";						  
						         echo"  <div class=\"boxed\">
	                             <a class=\"link2\" href=\"./claimTask.php\">Claim Task </a>						 
	                             <a class=\"link2\" href=\"./viewTask.php\">View Task</a>						 
	                             <a class=\"link\" href=\"./flagTask.php\">Flag Task</a> 
                                 </div><br><br>";
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
                             if (isset($_SESSION["ul_id"]) && $_SESSION["ul_id"] != '' && $_SESSION["is_Moderator"]=='1'){ 
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

				<!-- Copyright
					<ul id="copyright">
						<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul> -->

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>