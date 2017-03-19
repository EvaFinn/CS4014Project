<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "docdoc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM task"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
echo "Task ID" . $row['task_id'] . "<br>";//"Task Title" . $row['task_title'] . "Task Type" . $row['task_type'] . "Task Description" . $row['task_description'] . "Task Pages" $row['task_pages'] . "Task Words" . $row['task_words'] . "Task Format" . $row['task_format'] . "Claimed by" . $row['claimed'] . "Flagged" . $row['flagged'] . "Complete" . $row['complete'] . "Cancelled" . $row['cancelled'] . "Failed" . $row['failed'] . "Create by" . $row['created_by'] . "Submit by" . $row['submit_by'] . "<br>" ;  
}
} else {
     echo "0 results";
}


mysqli_close($conn);
?>  

</body>
</html>