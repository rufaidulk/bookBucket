<?php

session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document


include("includes/config.php");

if (isset($_GET['delSem'])) {
	$delId=$_GET['delSem'];
	$delSem="DELETE FROM semester WHERE semesterId='$delId'";
	$runDel=mysqli_query($conn, $delSem);

	if ($runDel) {
		echo "<script>alert('A semester has been deleted!');</script>";
		echo "<script>window.open('index.php?viewSem', '_self');</script>";
	}
}


}// session else statement closes here
?>