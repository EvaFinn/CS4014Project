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
		$First = (isset($_POST['fname'])?$_POST['fname']:'');
		$Last = (isset($_POST['lname'])?$_POST['lname']:'');
		$Field = (isset($_POST['field'])?$_POST['field']:'');
		$currentUser=$_SESSION['username'];
		$sql="UPDATE `user` SET `first_name`='$First',`last_name`='$Last',`field`='$Field' WHERE ul_id=$currentUser";
		mysqli_query($conn,$sql);
		if (mysqli_affected_rows($conn)>0) {
          header("Location: UserProfile.php?userid=$currentUser");
}
else{
echo "Failure. Please Fill in all the fields. ";
echo " <a href=\"#\" onclick=\"history.go(-1);\">Back</a>";}
		$conn->close();
?>
