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
      $currentUser = $_SESSION["username"];
	  $currentT=$_GET["task_id"];
	  $reviewDesc=$_POST["Tfield"];
	  $sql = "UPDATE task SET review='$reviewDesc',complete='1' WHERE task_id='$currentT'";
	  $res = mysqli_query($conn,$sql);
		if (mysqli_affected_rows($conn)>0) {
     echo "Success";
     header("Location: reviewSuccess.php");
}
else{echo "failure";}
		$conn->close();
?>
