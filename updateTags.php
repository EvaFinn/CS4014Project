<?php
    session_start();
	  $userID = $_SESSION['username'];
                    $servername = "localhost";
                    $username = "";
                    $password = "";
                    $db_name = ""; 
				    $currentTask=0;
                    // Create connection
                   $conn = new mysqli($servername, $username, $password, $db_name);
                   // Check connection
                   if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
                   }
   if(isset($_GET['submit'])){
   $i=0;
    foreach( $_GET as $key=>$val){
      if($key != 'submit'){
        $value[$i] = $key;
		echo"$value[$i]<br>";
		$i++;	
		}
    }
   }
  $tag1 = NULL;
   settype($tag1, 'string');
  $tag2 = NULL;
   settype($tag2, 'string');
  $tag3 = NULL;
   settype($tag3, 'string');
  $tag4 = NULL;
   settype($tag4, 'string');
  $tag5 = NULL;
   settype($tag5, 'string');
  $arr_length = count($value); 
  for($j=0;$j<$arr_length;$j++) 
  { 
    if($j==0){$tag1=$value[0];}
    if($j==1){$tag2=$value[1];}
    if($j==2){$tag3=$value[2];}
    if($j==3){$tag4=$value[3];}
    if($j==4){$tag5=$value[4];}
  }
   $sql="Select * from tags where tag_name IN ('$tag1','$tag2','$tag3','$tag4', '$tag5')";
    $res = mysqli_query($conn,$sql);
	$num=mysqli_num_rows($res);
	$k=0;
	while($row = mysqli_fetch_array($res))
      { 
	    $tagid[$k] = $row["tag_id"];
		$k=$k+1;
	  }
  $tagid1 = NULL;
   settype($tagid1, 'int');
  $tagid2 = NULL;
   settype($tagid2, 'int');
  $tagid3 = NULL;
   settype($tagid3, 'int');
  $tagid4 = NULL;
   settype($tagid4, 'int');
  $tagid5 = NULL;
   settype($tagid5, 'int');
  $arr_length2 = count($tagid); 
  for($j=0;$j<$arr_length2;$j++) 
  { 
    if($j==0){$tagid1=$tagid[0];}
    if($j==1){$tagid2=$tagid[1];}
    if($j==2){$tagid3=$tagid[2];}
    if($j==3){$tagid4=$tagid[3];}
    if($j==4){$tagid5=$tagid[4];}
  }
   $sql2="UPDATE favourite_tags SET favourite_tag_1='$tagid1',favourite_tag_2='$tagid2',
   favourite_tag_3='$tagid3',favourite_tag_4='$tagid4',favourite_tag_5='$tagid5' WHERE ul_id='$userID'";
   mysqli_query($conn,$sql2) or die("error");
   $conn->close();
  header("Location: myTags.php");
?> 
