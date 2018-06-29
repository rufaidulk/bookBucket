<form action="" method="POST" style="margin: 30px;">
	<b style="margin-left:20px;">Insert new semester:</b>
	<input type="text" name="newSem" style="width: 400px;"/>
	<input type="submit" name="addSem" value="Add Semester" class="w3-button w3-round-large" style="margin-right: 80px;margin-top: -4px;width: 120px;"/>
</form>
<?php

include("includes/config.php");

if (isset($_POST['addSem'])) {
	$newSem=$_POST['newSem'];
	$insertSem="INSERT INTO semester (semesterName) VALUES ('$newSem')";
	$runSem=mysqli_query($conn, $insertSem);

	if ($runSem) {
		echo "<script>alert('A new semester has been added!')</script>";
		echo "<script>window.open('index.php?newSem', '_self')</script>";
	}
}
?>