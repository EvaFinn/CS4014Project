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
	<h2> Cancel Task: </h2>
	<p><b> Warning, if you cancel a task your reputation will be effected.</b></p>
	<?php
	 $currentT = $_GET['task_id'];
	 $id=$_SESSION['username'];
	  echo "<a class=\"link2\" href=\"cancelTask.php?task_id=$currentT&user_id=$id\">Cancel Task </a>"
	 ?>
	  <a class= "link2" href="#" onclick="history.go(-1);">Back</a>  
    </div>
</div>
<div id="sidebar">
	<h1 id="logo"><a href="mainPage.php"></a></h1>
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