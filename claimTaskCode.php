<?php
$servername = "localhost";
$username = "";
$password = "";
$db_name = "docdoc"; 
$userID  = $_GET['userID'];
$currentT=$_GET['task_id']; 
// Create connection
 $conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO `claimed_tasks`(`task_id`, `hidden_id`) VALUES ($currentT,$userID);";
$sql .= "UPDATE `task` SET `claimed` = '1' WHERE `task`.`task_id` = $currentT;";
$sql .="UPDATE `user` SET `reputation`= (reputation + 10) WHERE ul_id='$userID'";
mysqli_multi_query($conn, $sql) or die("MySQL Error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
header("Location: mainPage.php");
$conn->close();
?>
