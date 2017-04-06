<?php
  $host = "localhost"; //host name
  $username = "root"; //username
  $password = ""; //pass
  $db_name = "Project"; 
  $tb_name= "task";
  //Connect to server and select databse
  $conn = new mysqli($host, $username, $password, $db_name);
   if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 		
		$title = (isset($_POST['title'])?$_POST['title']:'');
		$subject = (isset($_POST['subject'])?$_POST['subject']:'');
		$count = (isset($_POST['count'])?$_POST['count']:'');
		$pages = (isset($_POST['pages'])?$_POST['pages']:'');
		$description = (isset($_POST['description'])?$_POST['description']:'');
		$tags = (isset($_POST['tags'])?$_POST['tags']:'');
		$sql="INSERT INTO `task` (`task_id`, `task_title`, `task_type`, `task_description`, `task_pages`, `task_words`, `task_format`, `claimed`, `flagged`, `complete`, `cancelled`, `failed`, `created`, `claimed_by`, `submit_by`) VALUES (NULL, '$title', '$subject', '$description', '$count', '$pages', '.txt', '0', '0', '0', '0', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
		mysqli_query($conn,$sql);
		if (mysqli_affected_rows($conn)>0) {
   //echo "Sucess";
   require("mainPage.php");
}
else{echo "failure";}
		$conn->close();
?>
