<?php
/*if(!isset($_SESSION['login'])) { //if login in session is not set
    header("Location: LogInPage.php");
}*/
?>
<html >
<head>
<title> Create Task </title>
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/task.css"/>
<div class="topnav" id="myTopnav">
           <a href="logInPage.html"> Log Out</a>
           <a href="mainPage.html">Home</a>
		   <a href="FAQ.html">FAQ</a>       
</div>
</head>
<body>
<?php
	if (isset($_POST['submit'])) {
		try{
		//$id = $_SESSION["user_id"];
		$title = (isset($_POST['title'])?$_POST['title']:'');
		$subject = (isset($_POST['subject'])?$_POST['subject']:'');
		$count = (isset($_POST['count'])?$_POST['count']:'');
		$pages = (isset($_POST['pages'])?$_POST['pages']:'');
		$description = (isset($_POST['description'])?$_POST['description']:'');
		$tags = (isset($_POST['tags'])?$_POST['tags']:'');
		//$format = htmlspecialchars(trim($+POST["txtUploadFile[]"]))
		
		$dbh = new PDO("mysql:host=localhost;dbname=Project", "root", "");
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = "INSERT INTO 'task' ('task_id', 'task_title', 'task_type', 'task_description', 'task_pages', 'task_words') VALUES (NULL, :title, :subject, :description, :pages, :count)"; 
		$stmt = $dbh->prepare($query);
			
		$stmt->execute(array(':title' => $title, ':subject' => $subject, ':description' => $description, ':pages' => $pages, ':count' => $count));
		echo "New task created successfully";
		}catch(PDOExeption $e){
			echo "Error: " + $e->getMessage();
		}
		$dbh=null;
	}	
?>
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
		  <input type="text" name="tags"/>
		</li>
        <li>
		   <form action="uploadFile.php" method="post" onsubmit="return validateUploadFile();" enctype="multipart/form-data" >
                <p><input type="hidden" name="MAX_FILE_SIZE" value="100000" /></p>
                   <div class="uploadFileprompt">
                       <div class="span_left">File 1 to upload - Max. 100kb</div>
                       <div class="span_right"><input type="file" name="txtUploadFile[]"  /></div>
				   </div>
			</form>
		   <input type="submit" value="Submit" name="submit"/>
        </li>
        </ul>
     </form> 
	 </div>
	</div>
  </div>
<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="mainPage.html"></a></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="current"><a href="mainPage.html">Home</a></li>
							<li><a href="myTasks.html">My Tasks</a></li>
							<li><a href="claimedTasks.html">Claimed Tasks</a></li>
						 <!--<li><a href="#">Moderator Tasks</a></li>-->
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
