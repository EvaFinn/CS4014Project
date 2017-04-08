    <?php
	  session_start();
	  $host = "localhost"; //host name
      $username = "root"; //username
      $password = "softwarepro"; //pass
      $db_name = "docdoc"; 
      $tb_name= "task";
	  $conn = new mysqli($host, $username, $password, $db_name);
      if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 		
	  $currentUser = $_SESSION["username"];
	  $currentT=$_GET["task_id"];
	  $sql = "Select * FROM user NATURAL JOIN user_task WHERE task_id=$currentT";
	  $res = mysqli_query($conn,$sql);
	  $row = mysqli_fetch_assoc($res);
	  $taskOwnerE=$row["ul_email"];
	  $sql2 ="Select ul_email FROM user WHERE ul_id = $currentUser";
	  $res2 =mysqli_query($conn,$sql2);
	  $row2 = mysqli_fetch_assoc($res2);
	  $currentUEmail=$row2["ul_email"];
       $to      = "$taskOwnerE";
       $subject = "DocDoc - File Request";
       $message = "Hello- User: $currentUser has requested you email them the file of your task: $currentT";
       $headers = "From: $currentUEmail";
       //Should send email but functionallity isnt in place
	   $link = "<script>window.open('https://outlook.office.com/owa/');</script>";     
	   echo $link;
	   echo "<a href=\"#\" onclick=\"history.go(-1);\">Back</a>";
	  $conn->close();
     ?>
	 
