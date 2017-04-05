<?php
session_start();
$host = "localhost"; //host name
$username = "root"; //username
$password = "softwarepro"; //pass
$db_name = "docdoc"; 
$tbl_name = `log_in`;
//Connect to server and select databse
$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 
// username and password sent from form 
$myusername=(isset($_POST['ul_id']) ? $_POST['ul_id'] : ''); 
$mypassword=(isset($_POST['password']) ? $_POST['password'] : '');
$sql="SELECT * FROM `log_in` WHERE ul_id='$myusername' and password='$mypassword'";
$result=mysqli_query($conn, $sql);
// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['username']= "$myusername";
$_SESSION['password']= "$password";
   $sql1 ="SELECT * FROM `user` WHERE ul_id =$myusername";
   $res=mysqli_query($conn,$sql1);
   $data=mysqli_fetch_array($res);
    if($data["reputation"]>=40){
	$sql2 = "UPDATE `user` SET is_moderator=1 WHERE ul_id=$myusername";
	   $res1=mysqli_query($conn,$sql2);
	 $isMod=1;} 
   
    else{ 
	if($data["reputation"]<40){
	$sql3 = "UPDATE `user` SET is_moderator=0 WHERE ul_id=$myusername";
	   $res2=mysqli_query($conn,$sql3);
	 $isMod=0;
	}
	else{
	 $isMod=0;
	 }
	}	  
$_SESSION['is_moderator'] = "$isMod";
header("Location: mainPage.php");
}
else {
        printf("Invalid username or password");
}
?>
