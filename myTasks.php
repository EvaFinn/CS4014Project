<?php
/*if(!isset($_SESSION['login'])) { //if login in session is not set
    header("Location: LogInPage.php");
}*/
?>
<!DOCTYPE html>
<html >
<head>
<title>User Profile</title>
<link rel="stylesheet" href="assets/css/main.css"/>
<div class="topnav" id="myTopnav">
           <a href="logInPage.php"> Log Out</a>
           <a href="mainPage.php">Home</a>
		   <a href="FAQ.php">FAQ</a>       
</div>
</head>
<body>
		<div id="content">
				<div class="inner">
				<h1> Currently no tasks published </h1>
				</div>
				</div>
	<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="mainPage.html"></a></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
						<?php
                             if (isset($_SESSION["ul_id"]) && $_SESSION["ul_id"] != '' && $_SESSION["is_Moderator"]=='1'){ 
                                printf("<li><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li class=\"current\"><a href=\"./myTasks.php\">My Tasks</a></li>");
                                printf("<li><a href=\"./claimedTasks.php\">Claimed Tasks</a></li>");
								printf("<li><a href=\"./ModTasks.php\">Moderator Tasks</a></li>");
								
				            }
                            else{
							    printf("<li><a href=\"./mainPage.php\">Home</a></li>");
                                printf("<li class=\"current\"><a href=\"./myTasks.php\">My Tasks</a></li>");
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