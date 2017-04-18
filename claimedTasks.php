		<div id="content">
				<div class="inner">
				<h2> Tasks for review</h2>
			    <h1> Warning, cancelling tasks or failing to review tasks before deadline will reduce user reputation</h1>
           <!--   <div>   if (!(isset($success_message))) {echo "Unexpected error, please try again";}
                   else { echo  "Task sucessfully deleted";}   php not working atm
			  </div>-->
				<?php
				 $userID = $_SESSION['username'];
                 $servername = "localhost";
                 $username = "root";
                 $password = "softwarepro";
                 $db_name = "docdoc"; 
                 // Create connection
                 $conn = new mysqli($servername, $username, $password, $db_name);
                // Check connection
               if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }    
             	 $sql = "SELECT * FROM `task` NATURAL JOIN `claimed_tasks` where task.claimed = '1' AND claimed_tasks.hidden_id = $userID";
				 $result = mysqli_query($conn,$sql);
				 $num=mysqli_num_rows($result);
				 if($num==0){
				 echo"No Tasks currently claimed.";}
				 else{
				  echo"<div class=\"boxed\"> ";
              	 while($row = mysqli_fetch_array($result))
                 { 
				 if($row["complete"]!=1){
				  echo "<h1>" . $row["task_title"]. "</h1>";
				  echo "<p>Desciption: " . $row["task_description"].
				  "<br>Pages: ".$row["task_pages"]."</p>";
				  echo"<p>Word Count:".$row["task_words"]."</p>";		
				  echo"<p>Task ID:".$row["task_id"]."</p>";		
                  echo "<div class=\"boxed2\">";
				  $currentTask=$row["task_id"];
				   $tags="SELECT tag_name FROM `task_tag` where task_id = $currentTask";
				   $tresult=mysqli_query($conn,$tags);
				   $num=mysqli_num_rows($result);
				   while($trow=mysqli_fetch_array($tresult)){
				      echo "#" ,$trow["tag_name"]. ",";
				   }
				  echo" </div>
                        <div class=\"boxed\">
						  <a href=\"./cancelReview.php?task_id=$currentTask\"> Cancel Task</a>
						  <a href=\"./viewTask.php?task_id=$currentTask\"> View Task</a> 
						  <a href=\"./requestFile.php?task_id=$currentTask\"> Request File</a>	           
						  <a href=\"./reviewTask.php?task_id=$currentTask\"> Review Task</a>	           
                        </div></br>";		
                   }						
                 }				 
			    }
                $conn->close();
                 ?>
                         </div>
					
				</div>
				</div>
