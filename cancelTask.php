<?php
    $servername = "localhost";
    $username = "";
    $password = "";
    $db_name = "docdoc"; 
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  
	$currentT=$_GET['task_id'];
	$userID =$_GET['user_id'];
	$sql ="DELETE FROM `claimed_tasks` WHERE task_id ='$currentT';";
	$sql .= "UPDATE task SET claimed='0' WHERE task_id='$currentT';"; 
	$sql .="UPDATE `user` SET `reputation`= (reputation - 15) WHERE ul_id='$userID'";
    mysqli_multi_query($conn, $sql) or die("MySQL Error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
    $conn->close();
	header("Location: claimedTasks.php");
?>
