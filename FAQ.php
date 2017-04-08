<?php
  session_start();
  if(!isset($_SESSION['username'])) {header("Location: LogInPage.php");}
?>
<!DOCTYPE html>
<html >
<head>
<title> FAQ</title>
<link rel="stylesheet" href="assets/css/main.css"/>
<div class="topnav" id="myTopnav">
		    <a href="#" onclick="history.go(-1);">Back</a>  
</div>
</head>
<body>
<div id="content">
	<div class="inner">
     <div class = "boxed">
	   <div class=\"h_iframe">
				<header> 
				    <h2> Our Website</h2>
					<p></p>
				</header>							
		</article>
		<article>
				<header> 
				    <h3> Can someone without a university of Limerick email address sign up?</h3>
					<p> Unfortunately no, this website is made for members of the University of Limerick.</p>
				</header>							
		</article>
		<article >
				<header> 
				    <h3> What is happiness?</h3>
					<p> Happiness is how users are percieved by the website and users. The more active users will have more happiness.</p>
				</header>							
		</article>
		<article>
				<header> 
				    <h3> How do I claim a task?</h3>
					<p>Claiming task is simple, just click claim task on the main page or on a searched for task, and it will appear in your claimed task page.</p>
				</header>							
		</article>
		<article>
				<header> 
				    <h3> How do I become a moderator?</h3>
					<p>Users who are extremely helpful and have positive feedback will be upgraded to a moderator. Be careful though, abusing the moderator tasks may result in a ban or removal of moderator status</p>
				</header>							
		</div>
	  </div>
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
  			<script src="assets/js/sampJs.js"></script>
</body>
</html>
