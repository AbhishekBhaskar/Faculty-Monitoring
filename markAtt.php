<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	$at = $_POST['att'];
	$id = $_SESSION['id'];
	$Date = date("Y-m-d");
	
	$d = cal_days_in_month(CAL_GREGORIAN,10,2018);
	$date1 = date_create("2018-10-23");
	$date2 = date_create($Date);
	$diff = date_diff($date1,$date2);
	
	$sql2 = "SELECT * FROM attendance WHERE id=$id";
	$select2 = $mysqli->query($sql2);
	$res = mysqli_num_rows($select2);
	$c=0;
	if($res>0)
	{
		while($row = $select2->fetch_assoc())
		{
			if($row["Fac_attend"]==1)
				$c++;
		}
		
	}
	
	$hols = $diff-$c;
	
	
	if(isset($_POST['submit']) && isset($at))
	{
		if($Date==$date1)
		{
			$sql3 = "INSERT INTO attendance(id,Date,Fac_attend,No_hols) VALUES('$id','$Date',1,0)";
			$select3 = $mysqli->query($sql3);
			if($select3)
				echo("Attendance marked");
			else
				echo("Error in marking attendance" . $mysqli->error);
		}
		else
		{
			$sql = "INSERT INTO attendance(id,Date,Fac_attend,No_hols) VALUES ('$id','$Date',1,$hols)";
			$select4 = $mysqli->query($sql);
			if($select4)
				echo("Attendance marked");
			else
				echo("Error in marking attendance" . $mysqli->error);
		}
		
	}
	elseif(isset($_POST['submit']))
	{
		if($Date==$date1)
		{
			$sql4 = "INSERT INTO attendance(id,Date,Fac_attend,No_hols) VALUES('$id','$Date',0,0)";
			$select5 = $mysqli->query($sql4);
			if($select5)
				echo("Attendance marked");
			else
				echo("Error in marking attendance" . $mysqli->error);
		}
		else
		{
			$sql5 = "INSERT INTO attendance(id,Date,Fac_attend,No_hols) VALUES ('$id','$Date',0,$hols)";
			$select6 = $mysqli->query($sql5);
			if($select6)
				echo("Attendance marked");
			else
				echo("Error in marking attendance" . $mysqli->error);
		}
	}
	
	?>
</body>
</html>