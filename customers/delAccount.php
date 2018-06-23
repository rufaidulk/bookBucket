<div>
	<h3>Are you sure want to delete your account?</h3>
	<h6><b>Note:</b>This action can't be undo</h6>

	<form action="" method="POST" style="float: left;">
		<input type="submit" name="delete" value="Delete Account" class="w3-button w3-round-large" style="width: 150px;"/>
		<input type="submit" name="cancel" value="Cancel" class="w3-button w3-round-large"/>
	</form>
</div>
<?php
include("include/config.php");

$user=$_SESSION['customerEmail'];

if (isset($_POST['cancel'])) {
	echo "<script>window.open('myAccount.php','_self')</script>";
	exit();
}
if (isset($_POST['delete'])) {
	$delCust="DELETE FROM customers WHERE customerEmail='$user'";
	$runDel=mysqli_query($conn, $delCust);

	echo "<script>window.open('../logout.php', '_self')</script>";
}
?>