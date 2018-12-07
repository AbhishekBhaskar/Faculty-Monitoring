<?php
$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	//$name = $_SESSION['n'];
	//$id = $_SESSION['id'];
	$id = $_GET['id'];
	$name = $_GET['name'];
	if(isset($_POST['submit']))
	{
		$msg = $_POST["message"];
		$sql = "INSERT INTO faculty_tasks(id,Name,Message) VALUES($id,'{$mysqli->real_escape_string($name)}','{$mysqli->real_escape_string($msg)}')";
		$select = $mysqli->query($sql);
		if($select)
		{
			header("location: hod2.php?m_set='set'");
		}
		else
			echo('Error in updating message' . $mysqli->error);
	}

?>