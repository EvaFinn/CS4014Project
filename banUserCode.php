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
	$reason=$_POST["reason"];
	$currentT = $_GET["taskid"]; 
	echo"$currentT";
	$query="SELECT * FROM user_task NATURAL JOIN user WHERE task_id=$currentT";
	$res= mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($res);
    $userID =$row["ul_id"];
	$banEmail=$row["ul_email"];
	$sql ="INSERT INTO `banned_users`(`banned_id`, `banned_email`, `banned_reason`) VALUES ('$userID','$banEmail','$reason');";
	$sql .= "UPDATE user SET is_banned='1' WHERE ul_id='$userID'";
    mysqli_multi_query($conn, $sql) or die("MySQL Error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
    $conn->close();
	header("Location: ModTasks.php"); /* DOES NOT REMOVE CLAIMED TASK BY USER YET */
?>
