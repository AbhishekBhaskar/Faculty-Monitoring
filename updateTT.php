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
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		
		if(isset($_POST['submit']))
		{
			$first = $_POST['1'];
			$second = $_POST['2'];
			$third = $_POST['3'];
			$fourth = $_POST['4'];
			$fifth = $_POST['5'];
			$sixth = $_POST['6'];
			$seventh = $_POST['7'];
			$day = $_POST['day'];
			$id = $_SESSION['id'];

			$arr=array($first,$second,$third,$fourth,$fifth,$sixth,$seventh);
			$len=count($arr);
			$c=0;
			for($x=0;$x<$len;$x++)
			{
				if($arr[$x]=="")
					$c=$c+1;
			}
			
			$sql3 = "SELECT * FROM timetable WHERE id=" . $id;
			$select2 = $mysqli->query($sql3);
			
			$res1 = mysqli_num_rows($select2);
			if($res1>0)
			{
				
			
			$row = mysqli_fetch_assoc($select2);
			$sql4 = "SELECT * FROM timetable WHERE Day=" . $day;
			$select4 = $mysqli->query($sql4);
			$res2 = mysqli_num_rows($select4);
			if($res2>0)
			{
				
			
				$sql2 = "UPDATE timetable SET  1st_Hour='$first', 2nd_Hour='$second', 3rd_Hour='$third', 4th_Hour='$fourth', 5th_Hour='$fifth', 6th_Hour='$sixth', 7th_Hour='$seventh',NO_free_slots=$c WHERE id='$id'";

				$select = $mysqli->query($sql2);

				if($select)
				{
					echo("Time table updated");
				}
				else
					echo("Error in updating time table" . $mysqli->error);
				
			}
			else
			{
				$sql = "INSERT INTO timetable(id,Day,1st_Hour,2nd_Hour,3rd_Hour,4th_Hour,5th_Hour,6th_Hour,7th_Hour,No_free_slots) VALUES('$id','$day','$first','$second','$third','$fourth','$fifth','$sixth','$seventh',$c)";
				
				$select3 = $mysqli->query($sql);

				if($select3)
				{
					echo("Time table updated");
				}
				else
					echo("Error in updating time table" . $mysqli->error);
			}
			}
			
			else
			{
				
			
				$sql = "INSERT INTO timetable(id,Day,1st_Hour,2nd_Hour,3rd_Hour,4th_Hour,5th_Hour,6th_Hour,7th_Hour,No_free_slots) VALUES('$id','$day','$first','$second','$third','$fourth','$fifth','$sixth','$seventh',$c)";
				
				$select3 = $mysqli->query($sql);

				if($select3)
				{
					echo("Time table updated");
				}
				else
					echo("Error in updating time table" . $mysqli->error);
			
			}
			
		}
			
		}
	
	//else
	//	echo("error");
	?>
</body>
</html>