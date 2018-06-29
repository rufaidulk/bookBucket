<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document


include("includes/config.php");

if (isset($_GET['del'])) {
	$delId=$_GET['del'];
	$delBran="DELETE FROM branch WHERE branchId='$delId'";
	$runDel=mysqli_query($conn, $delBran);

	if ($runDel) {
		echo "<script>alert('A branch has been deleted!');</script>";
		echo "<script>window.open('index.php?viewBranch', '_self');</script>";
	}
}


}// session else statement closes here
?>