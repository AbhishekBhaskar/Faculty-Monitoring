<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<script type="text/javascript" src="script3.js"></script>
<link rel="stylesheet" type="text/css" href="mycss.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
</head>

<body>

<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	
	//$att = $_GET['att'];
	
	if(isset($_GET["att"]))
	{
		echo('
				<script type="text/javascript">
					function atFn()
					{
						alert("Attendence marked as " + ' . $_GET["att"] . ');
					}
					atFn();
				</script>
					');
	}
	if(isset($_GET["t"]))
	{
		echo('
				<script type="text/javascript">
					function tkFn()
					{
						alert("Task updated");
					}
					tkFn();
				</script>
					');
	}
	if(isset($_GET["m_set"]))
	{
		echo('
				<script type="text/javascript">
					function mFn()
					{
						alert("Message updated");
					}
					mFn();
				</script>
					');
	}
	
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
<a href="view2.php">View messages</a>
<a href="dispAtt2.php">Faculty Attendance</a>
	<a href="tAllot.php">Tasks</a>
</div>

<div class="column">
	<div class="column_left">
	
	
		<?php
			
		$myID = $_SESSION['id'];
		$_SESSION['id'] = $myID;
		$sql = "SELECT * FROM users WHERE userType='Faculty'";
		$select = $mysqli->query($sql);
		$res = mysqli_num_rows($select);
			
		
		$arr2 = array();
		
		$j = 0;
		$k=0;
		if($res>0)
		{
			while($row=$select->fetch_assoc())
			{
				$Name = $row['Name'];
				$ID = $row['User_Id'];
			//	$_SESSION['name'] = $row['Name'];
			//	$_SESSION['id'] = $row['User_Id'];
				$arr2[$j] = $row['User_Id'];
				$j++;
				
			
				
				$_SESSION['a'] = $arr2;
				echo('	<br>
						<div class="insideF" id=" ' . $row['User_Id'] . '">
							<div class="iF1">
								<p><b>Name:  ' . $row["Name"] . '<b></p>
								<p><b>email:  ' . $row["email"] . '</b></p>
								<p><b>Phone number:  ' . $row["Phone_No"] . '</b></p>');
								
					//echo('<button onClick="disp('. $row["User_Id"] . ')">Show Time Table</button>');		
		?>			
					<button onClick="del()">Show Time Table</button>			
							
					<div class='disTT' id='dT'>
	<div class='model-content animate'>
		
<?php	
		
		
		$sql2 = "SELECT * FROM timetable WHERE id=" . $ID;
	
	$select2 = $mysqli->query($sql2);
	
	$res2 = mysqli_num_rows($select2);
	
	if($res2>0)
	{
	/*	$sql1 = "SELECT * FROM timetable WHERE Day='Monday'";
		$sql2 = "SELECT * FROM timetable WHERE Day='Tuesday'";
		$sql3 = "SELECT * FROM timetable WHERE Day='Wednesday'";
		$sql4 = "SELECT * FROM timetable WHERE Day='Thursday'";
		$sql5 = "SELECT * FROM timetable WHERE Day='Friday'";  */
		
		$arr = array('Monday','Tuesday','Wednesday','Thursday','Friday');
		
		echo("<table>
		<tr>
			<th></th>
			<th>1st hour</th>
			<th>2nd Hour</th>
			<th>3rd Hour</th>
			<th>4th Hour</th>
			<th>5th Hour</th>
			<th>6th Hour</th>
			<th>7th Hour</th>
		</tr>");
		
		for($i=0;$i<5;$i++)
		{
			$sql6 = "SELECT * FROM timetable WHERE Day='" . $arr[$i] ."' AND id=" . $row['User_Id'];
			$sel2 = $mysqli->query($sql6);
			$res3 = mysqli_num_rows($sel2);
			
			if($res3>0)
			{
				$row2 = mysqli_fetch_assoc($sel2);
				echo("<tr>
						<td>" . $arr[$i] . "</td>
						<td>" . $row2['1st_Hour'] . "</td>
						<td>" . $row2['2nd_Hour'] . "</td>
						<td>" . $row2['3rd_Hour'] . "</td>
						<td>" . $row2['4th_Hour'] . "</td>
						<td>" . $row2['5th_Hour'] . "</td>
						<td>" . $row2['6th_Hour'] . "</td>
						<td>" . $row2['7th_Hour'] . "</td>
					  </tr>");
			}
			else
				echo("Error in selecting day");
				//header("location: fac_page.php");
		}
		echo("</table>");
		
	}
		else
			echo("Error in selecting timetable table");
			//header("location: login2.php");
	?>
		</div>
		</div>
							
							
							
				<?php			
					 echo('
							</div>
							
							<div class="iF1">
								<form method="post" action="task.php?id=' . $row['User_Id'] . '&name=' . $row['Name'] . '" id="TF">
							  Enter task message: <br>
								<textarea name = "tK" rows="5" cols="35"></textarea><br><br>
							  Enter date and time for task: <br>
								<input type="datetime-local" name="time"><br><br>
							  Enter message: <br>
							  	<textarea name = "msg" rows="8" cols="35"></textarea><br><br>
								<input type="submit" name="submit">
							</form>
							</div>
						</div>
						<br>
					<br>');
			}
			
	/*		while($row2=$select->fetch_assoc())
			{
				echo("
					<form method='post' action='task.php' id='TF'>
							  Enter task message: <br>
								<textarea name = 'tK' rows='8' cols='35'></textarea><br>
							  Enter date and time for task: <br>
								<input type='datetime-local' name='time'><br/>
								<input type='submit'>
							</form>
				");
			}      */
		}
		
	
		
		
?>		
	
		
	</div>
	
	<div class="column_right">
	
		<div id="calendar">
            <p id="calendar-day"></p>
            <p id="calendar-date"></p>
            <p id="calendar-month-year"></p>
        </div>
        <br>
        
        <form method="post" action="markAtt.php" id="f1">
       <!-- <p style="font-size: 16px">Mark Attendance</p>  -->
        Mark Attendance	<input type="checkbox" name="att">
        	<input type="submit" name="submit" value="Save" id="subm">
        </form>
	
		
	</div>
</div>

</div>

<script>
	
	
	var model = document.getElementById('dT');
	
	window.onclick=function(event)
	{
		if(event.target == model)
			{
				model.style.display = "none";
			}
	}
	
/*	function setSess(a, b)
	{
		a=b+4;
	}   */
	
</script>  

</body>
</html>