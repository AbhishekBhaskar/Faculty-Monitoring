
<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	
	if(isset($_POST['submit']))
	{
		$task_name = $_POST['tK'];
		$time = $_POST['time'];
		$message = $_POST['msg'];
		$name = $_SESSION['name'];
		$id = $_SESSION['id'];
		$time2 = date_create($time);
		$time3 = date_format($time2, 'Y-m-d H:i:00');
		$time4 = date_format($time2, 'Y-m-d');
		$time5 = date_format($time2, 'H:i:00');
		$arr = $_SESSION['a'];
		
		$sql = "SELECT * FROM timetable";
		$select = $mysqli->query($sql);
		$result = mysqli_num_rows($select);
		$myID = 0;
		
		if($result>0)
		{
			while($row=$select->fetch_assoc())
			{
			//	for($i=0;$i<sizeof($arr);$i++)
				foreach($arr as $value)
				{
					if($row['id'] == $value)
					{
						$myID = $row['id'];
						break;
					}
						
				}
			}
		}
		else
			echo("Error " . $mysqli->error . "<br>");
		
		$sql2 = "INSERT INTO for_hod(id,Faculty_name,Date,Free_slots,Task,Task_Time,Message) VALUES($id,'{$mysqli->real_escape_string($name)}','$time4',$myID,'{$mysqli->real_escape_string($task_name)}','$time5','{$mysqli->real_escape_string($message)}')";
		
		$select2 = $mysqli->query($sql2);
		
		$sql3 = "INSERT INTO faculty_tasks(id,Name,Date,Task,Alloted_time,Message) VALUES($id,'{$mysqli->real_escape_string($name)}','$time4','{$mysqli->real_escape_string($task_name)}','$time5','{$mysqli->real_escape_string($message)}')";
		
		$select3 = $mysqli->query($sql3);
		
		if($select2 and $select3)
		{
			echo("Task updated");
		}
		else
			echo("Error " . $mysqli->error);
			
		
	}
	
	?>
