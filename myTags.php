<?php
  session_start();
  if(!isset($_SESSION['username'])) {header("Location: LogInPage.php");}
?>
<!DOCTYPE html>
<html >
<head>
<title>My Tags</title>
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
				   <h2> My Tags </h2>
				   <a href="editFavourite.php">Update Favourite Tags</a>
				   <?php
				    $userID = $_SESSION['username'];
                    $servername = "localhost";
                    $username = "";
                    $password = "";
                    $db_name = ""; 
				    $currentTask=0;
                    // Create connection
                   $conn = new mysqli($servername, $username, $password, $db_name);
                   // Check connection
                   if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
                   }
				    $sql= " SELECT * FROM `favourite_tags` WHERE ul_id=$userID";
					$res = mysqli_query($conn,$sql);
					$num=mysqli_num_rows($res);
				    if($num==0){
				    echo"No favourited tags currently selected.";}
				    else{
				 	 while($row = mysqli_fetch_array($res))
                     { 
					  $tag1=$row["favourite_tag_1"];
					  $tag2=$row["favourite_tag_2"];
					  $tag3=$row["favourite_tag_3"];
					  $tag4=$row["favourite_tag_4"];
					  $tag5=$row["favourite_tag_5"];
					  $sql2="Select * from `tags` WHERE tag_id IN ('$tag1','$tag2','$tag3','$tag4','$tag5');";
					  $res2 = mysqli_query($conn,$sql2);
					  while($trows = mysqli_fetch_array($res2)){
					    echo "<ol>";
						echo "<li><b><a href=\"./#\">".$trows["tag_name"]."</a><b></li>";
					    echo "</ol>";
						}
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
                                printf("<li ><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li class=\"current\"><a href=\"./mytags.php\">Favourited Tags</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								printf("<li><a href=\"./ModTasks.php\">Moderator Tasks</a></li>");
								
				            }
                            else{
							    printf("<li ><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li class=\"current\"><a href=\"./myTags.php\">Favourited Tags</a></li>");
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
					</div>

</body>
</html>
