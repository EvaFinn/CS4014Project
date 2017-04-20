<?php
  session_start();
  $host = "localhost"; //host name
  $username = ""; //username
  $password = ""; //pass
  $db_name = "docdoc"; 
  $tb_name= "task";
  $currentU = $_SESSION["username"];
  //Connect to server and select databse
  $conn = new mysqli($host, $username, $password, $db_name);
   if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 		
		$title = (isset($_POST['title'])?$_POST['title']:'');
		$subject = (isset($_POST['subject'])?$_POST['subject']:'');
		$count = (isset($_POST['count'])?$_POST['count']:'');
		$pages = (isset($_POST['pages'])?$_POST['pages']:'');
		$description = (isset($_POST['field5'])?$_POST['field5']:'');
		$tag1 = (isset($_POST['tag1'])?$_POST['tag1']:'');
		$tag2 = (isset($_POST['tag2'])?$_POST['tag2']:'');
		$tag3 = (isset($_POST['tag3'])?$_POST['tag3']:'');
		$tag4 = (isset($_POST['tag4'])?$_POST['tag4']:'');
		$dDate = (isset($_POST['dueD'])?$_POST['dueD']:'');
		$dTime = (isset($_POST['dueT'])?$_POST['dueT']:'');	
		$sDate = (isset($_POST['subD'])?$_POST['subD']:'');
		$sTime = (isset($_POST['subT'])?$_POST['subT']:'');
		$dDateTime= $dDate.''.$dTime;
		$dDateTime = date("Y-m-d H:i:s",strtotime($dDateTime));
		$sDateTime= $sDate.''.$sTime;
		$sDateTime = date("Y-m-d H:i:s",strtotime($sDateTime));
		$sql="INSERT INTO task (`task_id`, `task_title`, `task_type`, `task_description`, `task_pages`, `task_words`, `task_format`, `claimed`, `flagged`, `complete`, `cancelled`, `failed`, `created`, `claimed_by`, `submit_by`,`review`) VALUES (NULL, '$title', '$subject', '$description', '$count', '$pages', '.txt', '0', '0', '0', '0', '0',CURRENT_TIMESTAMP,'$dDateTime','$sDateTime','')";
		$res = mysqli_query($conn,$sql);
		$sql2="SELECT * FROM task where task_title='$title'";
		$res2 = mysqli_query($conn,$sql2);
		$row = mysqli_fetch_assoc($res2);
		$taskid=$row["task_id"];
		$sql3="INSERT INTO `user_task`(`ul_id`, `task_id`) VALUES ('$currentU','$taskid')";
		$res3=mysqli_query($conn, $sql3);
		if (mysqli_affected_rows($conn)>0) {
     header("Location:taskTag.php?task=".$taskid."&tag1=".$tag1."&tag2=".$tag2."&tag3=".$tag3."&tag4=".$tag4);
}
else{  header("Location:failure.php");}
		$conn->close();
?>
