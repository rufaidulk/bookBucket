<div>
	<form action="" method="POST">
		<h3>Change your password</h3>
		<table>
			<tr>
				<td><b>Enter your current password:</b></td>
				<td><input type="password" name="currentPasswd"/></td>
			</tr>
			<tr>
				<td><b>Enter your new password:</b></td>
				<td><input type="password" name="newPasswd"/></td>
			</tr>
			<tr>
				<td><b>Confirm your password:</b></td>
				<td><input type="password" name="newPasswdConf"/></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="submit" name="changePasswd" value="Change Password" class="w3-button w3-round-large" style="width: 180px;" /></td>
			</tr>
		</table>
	</form>
</div>
<?php
include("include/config.php");

$userEmail=$_SESSION['customerEmail'];

if (isset($_POST['changePasswd'])) {
	$currentPasswd=$_POST['currentPasswd'];
	$newPasswd=$_POST['newPasswd'];
	$confPasswd=$_POST['newPasswdConf'];

	$selectUser="SELECT * FROM customers WHERE customerEmail='$userEmail' AND customerPasswd='$currentPasswd'";
	$runSelectUser=mysqli_query($conn, $selectUser);
	$checkUser=mysqli_num_rows($runSelectUser);

	if ($checkUser==0) {
		echo "<script>alert('wrong password!')</script>";
		exit();
	}

	if ($newPasswd!=$confPasswd) {
		echo "<script>alert('password not matching!')</script>";
		exit();
	}else{
		$updatePasswd="UPDATE customers SET customerPasswd='$newPasswd' WHERE customerEmail='$userEmail'";
		$runUpdatePasswd=mysqli_query($conn, $updatePasswd);

		if ($runUpdatePasswd) {
			echo "<script>alert('password changed successfully!')</script>";
			echo "<script>window.open('myAccount.php', '_self')</script>";
		}
	}
}
?>