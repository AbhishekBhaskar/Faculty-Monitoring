<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="script3.js"></script>
<link rel="stylesheet" type="text/css" href="mycss.css">
<title>Untitled Document</title>
</head>

<body>
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
	<a class="active" href="fac_page.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
<a href="view.php">View messages</a>
<a href="dispAtt.php">Faculty Attendance</a>
	<a href="tAllot.php">Tasks</a>
</div>
<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	
	
	
	$sql = "SELECT * FROM for_hod";
	$select = $mysqli->query($sql);
	$res = mysqli_num_rows($select);
	echo('<table style="margin: 75px 0 0 100px;">');
	echo('<tr><th>Name</th><th>Message</th><th>Reply Message</th></tr>');
	if($res>0)
	{
		while($row=$select->fetch_assoc())
		{
			
			if($row["Fac_msg"]!=NULL)
			{
				echo('<tr><td>' . $row["Faculty_name"] . '</td><td>'. $row["Fac_msg"]. '</td><td> 
				<form method="post" action="hod_msg.php?id=' . $row["id"] . '&name=' . $row["Faculty_name"] .'"  style="padding-top: 7px;">
				<textarea rows="3" cols="20" name="message" style="padding: 3px;border-radius: 10px;"></textarea><br>
				<input type="submit" name="submit">
		</form></td></tr>');
			}
			else
				continue;
		}
	}
	echo('</table>');
	?>

</div>

<script>
	function en()
	{
		var a = document.getElementById("msg3");
		a.disabled=false;
		//a.removeAttribute("disabled");
	}
	</script>
</body>
</html>