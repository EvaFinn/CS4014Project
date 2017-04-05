<?php 
	  if(isset($_POST['submit']))
	  { 
	  if(isset($_GET['go']))
	  { 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name']))
	  { 
	  $name=$_POST['name']; 
	  //connect  to the database 
	  $db=mysqli_connect  ("localhost", "root",  "") or die ('cannot connect to the database because: ' . mysqli_error()); 
	  //select  the database to use 
	  $mydb=mysqli_select_db($db,"docdoc"); 
	  //query  the database table 
	  $sql="SELECT  tag_id, tag_name FROM tags WHERE tag_id LIKE '%" . $name .  "%' OR tag_name LIKE '%" . $name ."%';";
	  $sql .= "SELECT ul_id, ul_email, first_name, last_name, field FROM user WHERE ul_id LIKE '%" . $name .  "%' OR ul_email LIKE '%" . $name .  "%' OR first_name LIKE '%" . $name .  "%' OR last_name LIKE '%" . $name .  "%' OR field LIKE '%" . $name .  "%'";
	  $sql .= "SELECT task_id, task_title, task_description, task_pages, task_words, task_format FROM task WHERE task_id LIKE '%" . $name .  "%' OR task_title LIKE '%" . $name .  "%' OR task_description LIKE '%" . $name .  "%' OR task_pages LIKE '%" . $name .  "%' OR task_words LIKE '%" . $name .  "%' OR task_format LIKE '%" . $name .  "%'";
	  if (mysqli_multi_query($db,$sql))
		{

				 if ($result=mysqli_store_result($db)) 
				 {
				  
				  while ($row=mysqli_fetch_array($result))
					{
						
						print_r($row);
						/*echo "<li>"  .$row .  "</a></li>\n"; 
						echo "</ul>"; */
						   
						/*else
						{ 
							echo  "<p>Can't search for that soz</p>"; 
						}*/
					}
				}
		}
	}
	}
	}
			
?> 
	  
			