<?php
            $id=$_GET[ "task"];
            $tag1=$_GET[ "tag1"];
            $tag2=$_GET[ "tag2"];
            $tag3=$_GET[ "tag3"];
            $tag4=$_GET[ "tag4"];
			session_start();
            $host = "localhost"; //host name
            $username = ""; //username
            $password = ""; //pass
            $db_name = ""; 
		    $conn = new mysqli($host, $username, $password, $db_name);
            if ($conn->connect_error) {
                             die("Connection failed: " . $conn->connect_error);
                              } 	
			$query="SELECT * from tags where tag_name='$tag1'";
			$res=mysqli_query($conn,$query);
			if(mysqli_affected_rows($conn)>0){
			$row = mysqli_fetch_assoc($res);
			$i1="INSERT INTO `task_tag`(`tag_id`, `task_id`, `tag_name`) VALUES (".$row["tag_id"].",'$id','$tag1')";
			mysqli_query($conn,$i1);}
			else{
			if(!(is_null($tag1))){
			 $ins="INSERT INTO tags(tag_id, tag_name) VALUES (NULL,'$tag1')";
			  mysqli_query($conn,$ins);
			 $in="SELECT * from tags WHERE tag_name=$tag1";
			 $results= mysqli_query($conn,$in);
			 $data = mysqli_fetch_assoc($results);
		     $tagid=$data["tag_id"];
			 $taski=$row1["task_id"];
			 $i="INSERT INTO task_tag(tag_id,task_id,tag_name) VALUES ('$taski','$id','$tag3')";
			  mysqli_query($conn,$insert);
			  }
			 }
			$query2="SELECT * from tags where tag_name='$tag2'";
			$res2=mysqli_query($conn,$query2);
			if(mysqli_affected_rows($conn)>0){
			$row2 = mysqli_fetch_assoc($res2);
			$taski2=$row2["task_id"];
			$i2="INSERT INTO task_tag(tag_id,task_id,tag_name) VALUES ('$taski2','$id','$tag2')";
			mysqli_query($conn,$i2);}
			else{
			if(!(is_null($tag2))){
			 $ins2="INSERT INTO tags(tag_id, tag_name) VALUES (NULL,'$tag2')";
			  mysqli_query($conn,$ins2);
			 $in2="SELECT * from tags WHERE tag_name='$tag2'";
			 $results2= mysqli_query($conn,$in2);
			 $data2 = mysqli_fetch_assoc($results2);
		     $tagid2=$data2["tag_id"];
			 $insert2="INSERT INTO `task_tag`(`tag_id`, `task_id`, `tag_name`) VALUES ('$tagid2','$id','$tag2')";
			  mysqli_query($conn,$insert2);
			  }
			}
			$query3="SELECT * from tags where tag_name='$tag3'";
			$res3=mysqli_query($conn,$query3);
			if(mysqli_affected_rows($conn)>0){
			$taski3=$row3["task_id"];
			$i3="INSERT INTO task_tag(tag_id,task_id,tag_name) VALUES ('$taski3','$id','$tag3')";
			$res3=mysqli_query($conn,$i3);}
			else{
			 if(!(is_null($tag3))){
			 $ins3="INSERT INTO tags(tag_id, tag_name) VALUES (NULL,'$tag3');";
			 mysqli_query($conn,$ins3);
			 $in3="SELECT * from tags WHERE tag_name='$tag3'";
			 $results3= mysqli_query($conn,$in3);
			 $data3 = mysqli_fetch_assoc($results3);
		     $tagid3=$data3["tag_id"];
			 $insert3="INSERT INTO `task_tag`(`tag_id`, `task_id`, `tag_name`) VALUES ('$tagid3','$id','$tag3')";
             mysqli_query($conn,$insert3);
			 }
			}
			$query4="SELECT * from tags where tag_name='$tag4'";
			$res4=mysqli_query($conn,$query4);
			if(mysqli_affected_rows($conn)>0){
			$row4 = mysqli_fetch_assoc($res4);
			$taski4=$row4["task_id"];
			$i4="INSERT INTO task_tag(tag_id,task_id,tag_name) VALUES ('$taski4','$id','$tag4')";
			$res4=mysqli_query($conn,$i4);}
			else{
			if(!(is_null($tag4))){
			$ins4="INSERT INTO tags(tag_id, tag_name) VALUES (NULL,'$tag4')";
			  mysqli_query($conn,$ins4);
			 $in4="SELECT * from tags WHERE tag_name=$tag4";
			 $results4= mysqli_query($conn,$in4);
			 $data4 = mysqli_fetch_assoc($results4);
		     $tagid4=$data4["tag_id"];
			 $insert4="INSERT INTO `task_tag`(`tag_id`, `task_id`, `tag_name`) VALUES ('$tagid','$id','$tag4')";
			  mysqli_query($conn,$insert4);
			  }
			 }
			  header("Location:reviewSuccess.php");
			$conn->close();
        ?>
