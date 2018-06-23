<?php
	$conn=mysqli_connect("localhost","root","","bookBucket");

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	
?>
