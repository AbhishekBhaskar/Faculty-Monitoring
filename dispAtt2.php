<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<script type="text/javascript" src="script3.js"></script>
<link rel="stylesheet" type="text/css" href="mycss.css"></head>
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

<h2>Details of staff attendance are shown below:</h2><br>
<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	
	$sql = "SELECT * FROM users";
	$select = $mysqli->query($sql);
	$res = mysqli_num_rows($select);
	
	$arr1 = array();
	$p=0;
	$arr2 = array();
	$q=0;
	$arr3 = array();
	$r=0;
	if($res>0)
	{
		while($row=$select->fetch_assoc())
		{
			$hols = 0;
			$c=0;
			$sql2 = "SELECT * FROM attendance WHERE id=" . $row['User_Id'];
			$select2 = $mysqli->query($sql2);
			$res2 = mysqli_num_rows($select2);
			if($res2>0)
			{
				$c++;
			}
			
			if($c<=1)
			{
				$c2=0;
				while($row2=$select2->fetch_assoc())
				{
					
					if($row2['Fac_attend']==1)
						$c2++;
					
					if($row2["No_hols"]>$hols)
						$hols = $row2["No_hols"];
					
					
				}
				
				$arr1[$p]=$row["Name"];
				$arr2[$q]=$c2;
				$arr3[$r]=$hols;
				$r++;
				$p++;
				$q++;
				//echo($row["Name"] . 'was present for ' . $c2 . 'days and number of holidays taken are ' . $hols . "<br>");
			}
			else
				continue;
			
		}
	}
	echo('<table>');
	echo('<tr><th>Name</th><th>Number of days attended</th><th>Number of days absent</th></tr>');
	for($i=0,$j=0,$k=0;$i<count($arr1)&&$j<count($arr2)&&$k<count($arr3);$i++,$j++,$k++)
	{
		echo('<tr><td>' . $arr1[$i] . '</td><td>' . $arr2[$j] . '</td><td>' . $arr3[$k] . '</td></tr>');
	}
	echo('</table>');
	
?>

</div>
</body>
</html>