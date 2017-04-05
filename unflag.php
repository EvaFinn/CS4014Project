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
	$currentT=$_GET['task_id'];
	$sql ="DELETE FROM flagged_task WHERE task_id = '$currentT';";
	$sql .= "UPDATE task SET flagged='0' WHERE task_id='$currentT'";
    mysqli_multi_query($conn, $sql) or die("MySQL Error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
    $conn->close();
	header("Location: mainPage.php");
?>
