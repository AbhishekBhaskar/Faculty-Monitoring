<?php
	
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();

	if(isset($_POST['submit']))
	{
		$msg = $_POST['Message'];
		$name = $_SESSION['name'];
		$id = $_SESSION['id'];
		$sql = "INSERT INTO for_hod(id,Faculty_name,Fac_msg) VALUES($id,'{$mysqli->real_escape_string($name)}','{$mysqli->real_escape_string($msg)}')";
		$select = $mysqli->query($sql);
		
		if($select)
		{
			
			//echo('al()');
		/*	echo('<script type="text/javascript">
					function al()
					{
						alert("Message registered");
					}
					al(); 
				  </script>	');   */
			
			header('location: fac_page.php?msg=set');
		}
			
	}
	

?>