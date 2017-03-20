<?php
$servername = "localhost";
$username = "root";
$password = "softwarepro";
$db_name = "docdoc"; 
$tbl_name = "deleted_tasks";
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO deleted_tasks (task_id)
VALUES ('111')";
$sql="DELETE FROM `flagged_task` WHERE task_id=111";

if ($conn->query($sql) === TRUE) {
    $success_message = "New record created successfully";
	header("Location: ModTasks.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
