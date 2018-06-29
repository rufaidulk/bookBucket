<?php

session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document


include("includes/config.php");

if (isset($_GET['editBran'])) {
	$branId=$_GET['editBran'];

	$getBran="SELECT * FROM branch WHERE branchId='$branId'";
	$runBran=mysqli_query($conn, $getBran);
	$rowBran=mysqli_fetch_array($runBran);

	$branName=$rowBran['branchName'];
}

?>
<form action="" method="POST" style="margin: 30px;">
	<b style="margin-left:20px;">Update branch:</b>
	<input type="text" name="newBran" value="<?php echo $branName; ?>" style="width: 400px;"/>
	<input type="submit" name="updateBran" value="Update Branch" class="w3-button w3-round-large" style="margin-right: 100px;margin-top: -4px;width: 120px;"/>
</form>
<?php

if (isset($_POST['updateBran'])) {
	$newBran=$_POST['newBran'];
	$updateBran="UPDATE branch SET branchName='$newBran' WHERE branchId='$branId'";
	$runBran=mysqli_query($conn, $updateBran);

	if ($runBran) {
		echo "<script>alert('Branch has been updated!')</script>";
		echo "<script>window.open('index.php?viewBranch', '_self')</script>";
	}
}

}// session else statement closes here
?>