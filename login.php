<?php
	header('Content-Type: application/json');
	//db setting
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "hyperloop";
	
	// Create connection
	//$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	$conn = new PDO('sqlite:../../db/hyperloop.s3db');
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// Get username and password from login page
	$clientUserName = $_POST["form-username"];
	$clientPassword = $_POST["form-password"];
	
	$sql= "select * from login where username='$clientUserName' and password='$clientPassword'";
	$response = $conn->query($sql);
	if ($row = $response->fetch(PDO::FETCH_ASSOC)) {
		header("Refresh:0;url=main.php");
	}
	else {
		echo("please try again");
		header("Refresh:5;url=login.html");
	}
?>