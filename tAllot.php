<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<script type="text/javascript" src="script3.js"></script>
<link rel="stylesheet" type="text/css" href="mycss.css">
</head>

<body>
<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	
	
?>

<div class="wrapper">

<div style="padding-left:16px; line-height: 35px;">
<img src="logo.png" alt="BMSIT"  id="logo_img" >
  
  <p style="font-size: 50px; color: brown; padding: 17px 0 0 8px;"><b>BMS<br><span style="font-size: 34px; color:rgba(54,6,155,1.00);">Institute of Tehnology and Management</span></b></p>
  
  
</div>  


	<div class="navbar">
	<div class="drBtn">
		<img src="login_avatar.png" id="icaret">
<!--		<i class="fa fa-caret-down" id="IC"></i>  -->
		<div class="drContent">
			<span class="logged_in">Logged in as <?php  echo($_SESSION['name']);?></span>
			<a href="login2.php">Logout</a>
			<a href="#">Modify account</a>
		</div>
	</div>
	<a class="active" href="hod2.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
<a href="view.php">View messages</a>
<a href="dispAtt.php">Faculty Attendance</a>
	<a href="tAllot.php">Tasks</a>
</div>
	<div class="column">
		
	<div class="column_left">
		
	

	<form method="post" action="<?php echo($_SERVER['PHP_SELF']);  ?>">
		<p>Enter task message: </p>
		<textarea name = "tK" rows="5" cols="35" style="margin-left: 17px;border-radius: 10px;"></textarea><br><br>
		<p>Enter amount of time required to carry out task in hours:</p>
		<input type="number" name="no" min="1" max="7" style="margin-left: 17px;border-radius: 10px;"><br><br>
		<p>Enter date and time for task: </p>
		<input type="datetime-local" name="time" style="margin-left: 17px;border-radius: 6px;"><br><br>
		<p>Enter message: </p><br>
		<textarea name = "msg" rows="8" cols="35" style="margin-left: 17px;border-radius: 10px;"></textarea><br><br>
		<input type="submit" name="submit" style="margin-left: 17px;">
	</form>
<br><br>
</div>
<div class="column_right">
<?php
	

	if(isset($_POST['submit']))
	{
		$task_name = $_POST['tK'];
		$time = $_POST['time'];
		$message = $_POST['msg'];
		$hours = $_POST['no'];
		$time2 = date_create($time);
		$time3 = date_format($time2, 'Y-m-d H:i:00');
		$time4 = date_format($time2, 'Y-m-d');
		$time5 = date_format($time2, 'H:i:00');
		$day = date_format($time2,'l');
		
		$_SESSION['tName'] = $task_name;
		$_SESSION['time'] = $time;
		$_SESSION['msg'] = $message;
		$_SESSION['hrs'] = $hours;
		
		
		
		echo("<p>The faculty members who are capable of doing the task are:- <br><br></p>");
		
		$sql = "SELECT * FROM timetable WHERE Day='$day' AND No_free_slots>=$hours";
		$select = $mysqli->query($sql);
		$result = mysqli_num_rows($select);
		
		if($result>0)
		{
			while($row=$select->fetch_assoc())
			{
				$sql2 = "SELECT * FROM users WHERE User_Id=".$row['id'];
				$select2 = $mysqli->query($sql2);
				$result2 = mysqli_num_rows($select2);
				
				if($result2>0)
				{
					while($row2=$select2->fetch_assoc())
					{
						echo('<p id="p1">' . $row2["Name"] . ', number of free slots are ' . $row["No_free_slots"] . '	
							<br> </p>	<form method="post" id="id1" action="taskAll.php?id='. $row["id"] .'&name='. $row2["Name"]. '&frsl='. $row["No_free_slots"]. '">
								  <input type="submit" name="submit" value="Assign task">
								  </form>
								<br><br>  ');
					}
				}
			}
		}
	}
	
	?>
	</div>	
	</div>
</body>
</html>