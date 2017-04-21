<?php
$servername = "localhost";
$username = "group7";
$password = "softwarepro";
$db_name = "group7"; 
$userID  = $_GET['userID'];
$currentT=$_GET['task_id']; 
// Create connection
$conn1= new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}
$query = "SELECT * FROM `user_task` WHERE task_id =$currentT";
$res= mysqli_query($conn1,$query);
$result = mysqli_fetch_assoc($res);
if(!($result["ul_id"] =$userID))
{
 $conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `claimed_tasks`(`task_id`, `hidden_id`) VALUES ($currentT,$userID);";
$sql .= "UPDATE `task` SET `claimed` = '1' WHERE `task`.`task_id` = $currentT";
mysqli_multi_query($conn, $sql) or die("MySQL Error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
header("Location: claimedTasks.php");
}
else
{
  header("Location:mainPage.php");
}
$conn1->close();
$conn->close();
?>
