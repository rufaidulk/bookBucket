<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document


?>
<form action="" method="POST" style="margin: 30px;">
	<b style="margin-left:20px;">Insert new branch:</b>
	<input type="text" name="newBran" style="width: 400px;"/>
	<input type="submit" name="addBran" value="Add Branch" class="w3-button w3-round-large" style="margin-right: 100px;margin-top: -4px;width: 120px;"/>
</form>
<?php

include("includes/config.php");

if (isset($_POST['addBran'])) {
	$newBran=$_POST['newBran'];
	$insertBran="INSERT INTO branch (branchName) VALUES ('$newBran')";
	$runBran=mysqli_query($conn, $insertBran);

	if ($runBran) {
		echo "<script>alert('A new branch has been added!')</script>";
		echo "<script>window.open('index.php?newBranch', '_self')</script>";
	}
}

}// session else statement closes here
?>