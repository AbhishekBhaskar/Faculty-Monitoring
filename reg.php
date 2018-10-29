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
	
	
	
	$u_name = $_POST['U_name'];
	$Email = $_POST['email'];
	$passw = $_POST['pass'];
	$type = $_POST['u_type'];
	$phNumber = $_POST['phNo'];
	
	if(empty($u_name) || empty($Email) || empty($passw) || empty($type) || empty($phNumber))
	{
		echo("Please fill all the details");
	}
	else
	{
		//echo("Working");
		
		//if(isset($_POST['submit']))
			
				//$enc = md5($passw);
			
				$sql = "INSERT into users(userType,Name,email,Phone_No,password) VALUES('{$mysqli->real_escape_string($type)}','{$mysqli->real_escape_string($u_name)}','{$mysqli->real_escape_string($Email)}','{$mysqli->real_escape_string($phNumber)}','{$mysqli->real_escape_string($passw)}') ";
				
				$insert = $mysqli->query($sql);
				
				if($insert)
					echo("User registered");
				else
					echo("Error");
			
		
		
	}
	
	
	?>
</body>
</html>