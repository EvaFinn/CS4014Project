<?php
$servername = "localhost";
$username = "root";
$password = "Escalofrios20";
$db_name = "docdoc"; 
$tbl_name = "deleted_tasks";
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO 'claimed' ('task_id')
VALUES ($_GET('task_id')";

$sql2 = "SELECT 'ul_id FROM 'user_task' WHERE 'task_id' = $_GET('task_id')"; 

mysqli_query($sql);
$hidden_id = mysqli_query($sql2);

if ($conn->query($sql) === TRUE) {
    $success_message = "New record created successfully";
	header("Location: ModTasks.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
