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
    $userID =$_GET['userID'];
	$sql ="INSERT INTO flagged_task(`task_id`, `pending _review`, `post_review_status`) VALUES ($currentT,0,'');";
	$sql .= "UPDATE task SET flagged='1' WHERE task_id='$currentT';";
	$sql .="UPDATE user SET `reputation`= (reputation + 2) WHERE ul_id='$userID'";
    mysqli_multi_query($conn, $sql) or die("MySQL Error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
    $conn->close();
	header("Location: mainPage.php");
?>
