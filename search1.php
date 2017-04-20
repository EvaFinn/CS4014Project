<?php 
	  if(isset($_POST['submit']))
	  { 
	  if(isset($_GET['go']))
	  { 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name']))
	  { 
	  $name=$_POST['name']; 
	  $db=mysqli_connect  ("localhost", "root",  "") or die ('cannot connect to the database because: ' . mysqli_error()); 
	  $mydb=mysqli_select_db($db,"docdoc"); 
	  $sql= "SELECT task_id, task_title, task_description, task_pages, task_words, task_format FROM task WHERE task_id LIKE '%$name%' OR task_title LIKE '%$name%' OR task_description LIKE '%$name%' OR task_pages LIKE '%$name%' OR task_words LIKE '%$name%' OR task_format LIKE '%$name%'";
	  $res = mysqli_query($db,$sql);
	  if($res != NULL)
	  {
		  
	  while($row=mysqli_fetch_array($res)){ 
	  $task_id=$row['task_id'];
	  $task_title  =$row['task_title']; 
	  $task_description=$row['task_description'];
      $task_pages  =$row['task_pages']; 
	  $task_words=$row['task_words'];
	  $task_format=$row['task_format'];
	  
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"search.php?tag_id=$task_id\">"   .$task_id . " " . $task_title .  " "   .$task_description . " " . $task_pages .  " "   .$task_words . " " . $task_format .  "</a></li>\n"; 
	  echo "</ul>"; 
	  }
	  }	  
	  $sql2 = "SELECT  tag_id, tag_name FROM tags WHERE tag_id LIKE '%$name%' OR tag_name LIKE '%$name%'";
	  $res2 = mysqli_query($db,$sql2);
	  if($res2 != NULL)
	  {
	  
	  while($row=mysqli_fetch_array($res2)){ 
	  $tag_id=$row['tag_id'];
	  $tag_name  =$row['tag_name']; 
	  
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"search.php?tag_id=$tag_id\">"   .$tag_id . " " . $tag_name .  "</a></li>\n"; 
	  echo "</ul>";
	  }
	  }	  
	 
	  
	}
	}
	}
			
?> 
	  
			
