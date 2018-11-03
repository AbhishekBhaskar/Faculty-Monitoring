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
	$diff2 = $diff->format("%a");
	$sql2 = "SELECT * FROM attendance WHERE id=$id";
	$select2 = $mysqli->query($sql2);
	$res = mysqli_num_rows($select2);
	$c=0;
	$f = date_format($date1,"Y-m-d");
	date_add($date1,date_interval_create_from_date_string("1 day"));
//	echo($f . "<br>");
//	echo(date_format($date1,'Y-m-d') . "<br>");
	
	if($res>0)
	{
		while($row = $select2->fetch_assoc())
		{
			if($row["Fac_attend"]==1)
				$c++;
		}
		
	}
	$c++;
	$hols = $diff2-$c;
	
	
	if(isset($_POST['submit']) && isset($at))
	{
		if($Date==$date1)
		{
			$sql3 = "INSERT INTO attendance(id,Date,Fac_attend,No_hols) VALUES('$id','$Date',1,0)";
			$select3 = $mysqli->query($sql3);
			if($select3)
			{
				if($id==8)
					header("location: hod2.php?att=1");
				else
					header("location: fac_page.php?att=1");
				
			}
			else
				echo("Error in marking attendance" . $mysqli->error);
		}
		else
		{
			$sql = "INSERT INTO attendance(id,Date,Fac_attend,No_hols) VALUES ('$id','$Date',1,$hols)";
			$select4 = $mysqli->query($sql);
			if($select4)
			{
				if($id==8)
					header("location: hod2.php?att=1");
				else
					header("location: fac_page.php?att=1");
			}
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
			{
				if($id==8)
					header("location: hod2.php?att=0");
				else
					header("location: fac_page.php?att=0");
			}
			else
				echo("Error in marking attendance" . $mysqli->error);
		}
		else
		{
			$sql5 = "INSERT INTO attendance(id,Date,Fac_attend,No_hols) VALUES ('$id','$Date',0,$hols)";
			$select6 = $mysqli->query($sql5);
			if($select6)
				if($id==8)
					header("location: hod2.php?att=0");
				else
					header("location: fac_page.php?att=0");
			else
				echo("Error in marking attendance" . $mysqli->error);
		}
	}
	
	?>
</body>
</html>