<?php
/*if(!isset($_SESSION['login'])) { //if login in session is not set
    header("Location: LogInPage.php");
}*/
?>
<!DOCTYPE html>
<html >
<head>
<title> Create Task </title>
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/task.css"/>
<div class="topnav" id="myTopnav">
           <a href="logInPage.php"> Log Out</a>
           <a href="mainPage.php">Home</a>
		   <a href="FAQ.php">FAQ</a>       
</div>
</head>
<body>
  <div id="content">
	<div class="inner">
	<h1>Create Task </h1>
	 <div class="task">
	 <form method="POST">
       <ul>
       <li>
	      <label>Document Title</label>
	      <input type="text" name="title"/>
       <li>
          <label>Field of Topic</label>
          <input type="text" name="subject"/>
       </li>
	   <li>
         <label>Word Count</label>
         <input type="text" name="count"/>
       </li>
       <li>
	      <label>Number of Pages</label>
		    <input type="text"name="pages"/>
	    </li>
        <li>
          <label>Document Description</label>
           <textarea name="field5" id="description"></textarea>
        </li>
		<li>
		  <label> Document Tags</label>
		  <p>Please seperate tags with a comma i.e Science, Sports, Fitness ect</p>
		  <input type="text" name="Tags"/>
		</li>
        <li>
		   <form action="uploadFile.php" method="post" onsubmit="return validateUploadFile();" enctype="multipart/form-data" >
                <p><input type="hidden" name="MAX_FILE_SIZE" value="100000" /></p>
                   <div class="uploadFileprompt">
                       <div class="span_left">File 1 to upload - Max. 100kb</div>
                       <div class="span_right"><input type="file" name="txtUploadFile[]"  /></div>
				   </div>
			</form>
		   <input type="submit" value="Submit" />
        </li>
        </ul>
     </form> 
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
</body>
</html>