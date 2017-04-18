<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "Project";
	
	$conn = new mysqli($host, $username, $password, $db_name);
	if($conn->connect_error){
		die("Connect failed: " . $conn->connect_error);
		}
		$email = (isset($_POST['email'])?$_POST['email']:'');
		$IDnum = (isset($_POST['IDnum'])?$_POST['IDnum']:'');
		$firstName = (isset($_POST['firstName'])?$_POST['firstName']:'');
		$lastName = (isset($_POST['lastName'])?$_POST['lastName']:'');
		$field = (isset($_POST['field'])?$_POST['field']:'');
		$password = (isset($_POST['passw'])?$_POST['passw']:'');
		
		$sql="INSERT INTO `user`(`ul_id`, `ul_email`, `first_name`, `last_name`, `field`, `reputation`, `is_moderator`, `is_banned`, `has_deleted`) VALUES ('$IDnum', '$email', '$firstName', '$lastName', '$field', '0', '0', '0', '0');";
		$sql.="INSERT INTO `log_in`(`ul_id`, `password`) VALUES ('$IDnum','$password')";
		mysqli_multi_query($conn, $sql) or die("MySQL Error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
		if(mysqli_affected_rows($conn)>0){
			  header("Location: LogInPage.php");
		}
		else{  header("Location: RegistrationForm.php");}
		$conn->close();

?>
