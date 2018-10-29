<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	$Email = $_POST['email'];
	$passw = $_POST['pass'];
	
	$enc = md5($passw);
	
	$sql = "SELECT * FROM users WHERE email LIKE '$Email' AND password LIKE '$passw'";
	
	
	$select = $mysqli->query($sql);
	
	$result = mysqli_num_rows($select);
	
	
	if($result>0)
	{
		session_start();
		
		$row = mysqli_fetch_assoc($select);
		$_SESSION['name'] = $row["Name"];
		$_SESSION['id'] = $row["User_Id"];
		
		if($row["userType"] == "Faculty")
		{
			header("location: fac_page.php");
		}
		elseif($row["userType"] == "HOD")
		{
			header("location: hod_page.php");
		}
	}
	else
		echo("Wrong username or password");
	
	
	?>

</body>
</html>