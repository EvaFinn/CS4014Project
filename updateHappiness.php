<?php
  session_start();
  $host = "localhost"; //host name
  $username = "root"; //username
  $password = "softwarepro"; //pass
  $db_name = "docdoc"; 
  $tb_name= "task";
  //Connect to server and select databse
  $conn = new mysqli($host, $username, $password, $db_name);
   if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
							 }
	  $currentT=$_GET["task_id"];
	  $Happiness=0;
	  $claimee=12345678;
	  $h=$_GET["Happy"];
	  if($h==1){
	  $Happiness=5;
	  }
	  else{$Happiness=-5;}
	  $sql = "UPDATE user SET reputation = (reputation+$Happiness)WHERE ul_id='$claimee';";
	  $sql .= "UPDATE task SET review = '' WHERE task_id='$currentT'";
	  mysqli_multi_query($conn, $sql) or die("MySQL Error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
		if (mysqli_affected_rows($conn)>0) {
     echo "Success";
     header("Location: myTasks.php");
}
else{echo "failure"; echo"<a href=\"#\" onclick=\"history.go(-1);\">Back</a>";}
		$conn->close();
?>
