<?php

session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document



include("includes/config.php");

if (isset($_GET['editSem'])) {
	$semId=$_GET['editSem'];

	$getSem="SELECT * FROM semester WHERE semesterId='$semId'";
	$runSem=mysqli_query($conn, $getSem);
	$rowSem=mysqli_fetch_array($runSem);

	$semName=$rowSem['semesterName'];
}

?>
<form action="" method="POST" style="margin: 30px;">
	<b style="margin-left:20px;">Update semester:</b>
	<input type="text" name="newSem" value="<?php echo $semName; ?>" style="width: 400px;"/>
	<input type="submit" name="updateSem" value="Update semester" class="w3-button w3-round-large" style="margin-right: 100px;margin-top: -4px;width: 120px;"/>
</form>
<?php

if (isset($_POST['updateSem'])) {
	$newSem=$_POST['newSem'];
	$updateSem="UPDATE semester SET semesterName='$newSem' WHERE semesterId='$semId'";
	$runSem=mysqli_query($conn, $updateSem);

	if ($runSem) {
		echo "<script>alert('semester has been updated!')</script>";
		echo "<script>window.open('index.php?viewSem', '_self')</script>";
	}
}

}// session else statement closes here

?>