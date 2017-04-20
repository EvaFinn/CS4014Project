<?php
session_start();
$host = "localhost"; //host name
$username = ""; //username
$password = ""; //pass
$db_name = "docdoc"; 
$tbl_name = "log_in";
//Connect to server and select databse
$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              }  
$myusername=$_POST['ul_id']; 
$mypassword=$_POST['password'];
$sql="SELECT * FROM `log_in` WHERE ul_id='$myusername' and password='$mypassword'";
$result=mysqli_query($conn, $sql);
$count=mysqli_num_rows($result);
if($count==1){
$_SESSION['username']= "$myusername";
$_SESSION['password']= "$mypassword";
   $sql1 ="SELECT * FROM `user` WHERE ul_id =$myusername";
   $res=mysqli_query($conn,$sql1);
   $data=mysqli_fetch_array($res);
   if($data["is_banned"]==1)
   {
     header("Location:bannedPage.php");  
   }
   else{
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
}
else {
        printf("Invalid username or password");
		echo "</br> <a href=\"#\" onclick=\"history.go(-1);\">Back</a> ";
}
?>
