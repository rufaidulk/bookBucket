<?php

session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document


include("includes/config.php");

if (isset($_GET['delCust'])) {
	$delId=$_GET['delCust'];
	$delCust="DELETE FROM customers WHERE customerId='$delId'";
	$runDel=mysqli_query($conn, $delCust);

	if ($runDel) {
		echo "<script>alert('A customer has been deleted!');</script>";
		echo "<script>window.open('index.php?viewCust', '_self');</script>";
	}
}

}// session else statement closes here

?>