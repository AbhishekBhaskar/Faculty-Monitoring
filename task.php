
<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	//$name = $_SESSION['n'];
	//$id = $_SESSION['id'];
	$id = $_GET['id'];
	$name = $_GET['name'];
	if(isset($_POST['submit']))
	{
		$task_name = $_POST['tK'];
		$time = $_POST['time'];
		$message = $_POST['msg'];
		
		$time2 = date_create($time);
		$time3 = date_format($time2, 'Y-m-d H:i:00');
		$time4 = date_format($time2, 'Y-m-d');
		$time5 = date_format($time2, 'H:i:00');
		$day = date_format($time2,'l');
		$arr = $_SESSION['a'];
		
		$sql = "SELECT * FROM timetable WHERE Day = '$day' AND id=$id";
		$select = $mysqli->query($sql);
		$result = mysqli_num_rows($select);
		$myID = 0;
		if($result>0)
		{
			while($row=$select->fetch_assoc())
			{
				$free_slots = $row['No_free_slots'];
			}
		}
		else
			echo("Error in updating free slots <br>");
		
		
	
		
		$sql2 = "INSERT INTO for_hod(id,Faculty_name,Date,Free_slots,Task,Task_Time,Message) VALUES($id,'{$mysqli->real_escape_string($name)}','$time4','$free_slots','{$mysqli->real_escape_string($task_name)}','$time5','{$mysqli->real_escape_string($message)}')";
		
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
