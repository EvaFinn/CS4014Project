<?php
  session_start();
  $host = "localhost"; //host name
  $username = "root"; //username
  $password = "softwarepro"; //pass
  $db_name = "docdoc"; 
  $tb_name= "user";
  //Connect to server and select databse
  $conn = new mysqli($host, $username, $password, $db_name);
   if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 		
		$Password = (isset($_POST['pass1'])?$_POST['pass1']:'');
		$PassCopy = (isset($_POST['pass2'])?$_POST['pass2']:'');
		if($Password == $PassCopy){
		$currentUser=$_SESSION['username'];
		$sql="UPDATE `log_in` SET `password`='$Password' WHERE ul_id=$currentUser";
		mysqli_query($conn,$sql);
		if (mysqli_affected_rows($conn)>0) {
        header("Location: passwordSucess.php");
        }
        }
   else{
    echo "Failure. Passwords do not match ";
    echo " <a href=\"#\" onclick=\"history.go(-1);\">Back</a>";}
		$conn->close();
?>
