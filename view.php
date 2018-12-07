<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<script type="text/javascript" src="script3.js"></script>
<!--<link rel="stylesheet" type="text/css" href="mycss.css">-->







<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
	
body
	{
		background-color: linear-gradient(to right,rgba(164, 197, 249,0.3),rgba(164, 197, 249,0.9));
	}
}


img {
    float: left;
}
body {font-family: Arial, Helvetica, sans-serif; }

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>









</head>

<body>



<?php
	$mysqli = new MySQLi('localhost','root','','webproject');
	
	if($mysqli->connect_error)
	{
		die("Database not connected " . $mysqli->connect_error);
	}
	
	session_start();
	?>
	
<div class="wrapper">


<div class="navbar">
  <a class="active" href="hod2.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
	<div class="drBtn">
  <a href="#"><i class="fa fa-fw fa-user"></i> <?php  echo($_SESSION['name']);?>

<i class="down"></i>
		<div class="drContent">
			<span class="logged_in">Logged in as <?php  echo($_SESSION['name']);?></span>
			<a href="login2.php">Logout</a>
			<a href="#">Modify account</a>
		</div>


</a>

</div>
</div>


<?php

$sqll="select * from for_hod ";

$select2 = $mysqli->query($sqll);
$result=mysqli_num_rows($select2);
if($result>0){
echo "<table style='padding:10px;' id='customers'><tr><th>Faculty name</th><th>Date</th><th>Message</th></tr>";
while($row=mysqli_fetch_assoc($select2)){
echo "<tr><td>".$row['Faculty_name']."</td><td>". $row['Date']."</td><td>".$row['Message']."/td"  ;
}
}

?>

</body>






