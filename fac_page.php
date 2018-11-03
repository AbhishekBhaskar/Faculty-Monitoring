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
	
	
	
	if($_GET["msg"]=='set')
	{
		echo('<script type="text/javascript">
					function al()
					{
						alert("Message registered");
					}
					al(); 
				  </script>	');
	}
	else
	{
		
	}
	
	?>
 <!-- <span class="logged_in">Logged in as <?php  echo($_SESSION['name']);?></span> -->
<div class="wrapper">

<div class="navbar">
	<div class="drBtn">
		<img src="login_avatar.png" id="icaret">
		<i class="down"></i>
		<div class="drContent">
			<span class="logged_in">Logged in as <?php  echo($_SESSION['name']);?></span>
			<a href="login2.php">Logout</a>
			<a href="#">Modify account</a>
		</div>
	</div>
</div>

<br/>
  <div class="column">   
	<div class="column_left">
	
	<?php
		
		$sql = "SELECT * FROM timetable WHERE id=" . $_SESSION['id'];
	
	$select = $mysqli->query($sql);
	
	$res = mysqli_num_rows($select);
	
	if($res>0)
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
			$sql6 = "SELECT * FROM timetable WHERE Day='" . $arr[$i] ."' AND id='" . $_SESSION['id'] . "'";
			$sel2 = $mysqli->query($sql6);
			$res2 = mysqli_num_rows($sel2);
			
			if($res2>0)
			{
				$row = mysqli_fetch_assoc($sel2);
				echo("<tr>
						<td>" . $arr[$i] . "</td>
						<td>" . $row['1st_Hour'] . "</td>
						<td>" . $row['2nd_Hour'] . "</td>
						<td>" . $row['3rd_Hour'] . "</td>
						<td>" . $row['4th_Hour'] . "</td>
						<td>" . $row['5th_Hour'] . "</td>
						<td>" . $row['6th_Hour'] . "</td>
						<td>" . $row['7th_Hour'] . "</td>
					  </tr>");
			}
		}
		echo("</table>");
		
	}
		
		
		
		?>
	
	
	
	<br/>
		<button onClick="myFn()" id="btn">
			Edit time table
		</button>
		<br><br>
	<!--	<div id="TT">
			<form method="post" action="updateTT.php">
			Enter day: <input type="text" name="day" id="Day"><br><br>
				<table style="width: auto" id="tt1">
					<tr>
						<th>1st Hour</th><td><input type="text" name="1" value=""></td>
					</tr>
					<tr>
						<th>2nd Hour</th><td><input type="text" name="2" value=""></td>
					</tr>
					<tr>
						<th>3rd Hour</th><td><input type="text" name="3" value=""></td>
					</tr>
					<tr>
						<th>4th Hour</th><td><input type="text" name="4" value=""></td>
					</tr>
					<tr>
						<th>5th Hour</th><td><input type="text" name="5" value=""></td>
					</tr>
					<tr>
						<th>6th Hour</th><td><input type="text" name="6" value=""></td>
					</tr>	
					<tr>
						<th>7th Hour</th><td><input type="text" name="7" value=""></td>
					</tr>		

				</table>
				<input type="submit" name="submit">
			</form>
		</div>   -->
		
		<div id="TT">
			<form method="post" action="updateTT.php">
			Enter day: <input type="text" name="day" id="Day"><br><br>
			1st Hour<input type="text" name="1" value=""><br/>
			2nd Hour<input type="text" name="2" value=""><br/>
			3rd Hour<input type="text" name="3" value=""><br/>
			4th Hour<input type="text" name="4" value=""><br/>
			5th Hour<input type="text" name="5" value=""><br/>
			6th Hour<input type="text" name="6" value=""><br/>
			7th Hour<input type="text" name="7" value=""><br/>
		<input type="submit" name="submit">
		</form>
		</div> 
		<br><br>
		<button onClick="en()" id="msg">Enter message to HOD</button><br>
		<form method="post" action="fac_msg.php" style="padding-top: 7px;">
			<fieldset id="msg2" disabled style="width: 35%;">
				<textarea rows="6" cols="40" name="Message" style="padding: 3px;"></textarea><br>
				<input type="submit" name="submit">
			</fieldset>
		</form>
		
	</div>
	
	<div class="v1"></div>
	
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
	<br>
		<div class="tasks">
		<p>Scheduled tasks:</p>
			<?php
				$sql2 = "SELECT * FROM faculty_tasks WHERE id=" . $_SESSION['id'];
				$sel3 = $mysqli->query($sql2);
				$res3 = mysqli_num_rows($sel3);
				
				if($res3>0)
				{
					while($row2=$sel3->fetch_assoc())
					{
						$date = $row2["Date"];
						$date2 = date_create($date);
						$date3 = date_format($date2,'d-m-Y');
						$day = date_format($date2, 'l');
						echo('<ul style="list-style-type: disc">
								<li>'. $row2["Task"] . ' <br>On '.$day. ',' . $date3 . ' at ' . $row2["Alloted_time"] . '<br>Message: '. $row2["Message"] .'</li>');
					}
				}
			?>
		</div>
		
	</div>
  </div>   
	</div>

<script>
	function myFn()
	{
		var tt=document.getElementById("TT");
		if(tt.style.display === "none")
			tt.style.display = "block";
		else 
			tt.style.display = "none";   
	/*	var tt=document.getElementById("TT");
		tt.style.display="block";  */
	}
	
	function en()
	{
		var a = document.getElementById("msg2");
		a.disabled=false;
		//a.removeAttribute("disabled");
	}
	</script>

 

</body>
</html>