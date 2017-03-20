<?php
    $servername = "localhost";
    $username = "root";
    $password = "softwarepro";
    $db_name = "docdoc"; 
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  
	$sql ="INSERT INTO flagged_task(`task_id`, `pending _review`, `post_review_status`) VALUES (111,0,Null)";
	$sql = "UPDATE task SET flagged=1 WHERE task_id=111"; //Match ID of task stream not established yet
  
			if ($conn->query($sql) === TRUE) {
    $success_message = "New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    $conn->close();
	header("Location: mainPage.php");
?>