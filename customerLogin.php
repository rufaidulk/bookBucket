<!DOCTYPE html>
<?php
include('include/config.php');
?>
<html>
<head>
	<title>Customer login</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div>
		<form method="POST" action="">
			<table>
				<tr>
					<td><h3>Login</h3>
				</tr>
				<tr>
					<td>E-mail:</td>
					<td><input type="text" name="email" placeholder="Enter your email"/></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="passwd" placeholder="Enter your password"/></td>
				</tr>
				<tr>
					<td><a href="checkout.php" style="text-decoration:none;color:orange;">Forgot password?</a></td>
				</tr>
				<tr>
					<td><input type="submit" name="login" value="Login" class="w3-button w3-round-large"/></td>
				</tr>
			</table>
			<h5><a href="customerRegistration.php" style="text-decoration:none;"><b>New User?Register</b></a></h>
		</form>
	</div>

</body>
</html>
<?php
if (isset($_POST['login'])) {
	$custEmail=$_POST['email'];
	$custPasswd=$_POST['passwd'];

	$selectCust="SELECT * FROM customers WHERE customerEmail='$custEmail' AND customerPasswd='$custPasswd'";
	$runSeleCust=mysqli_query($conn, $selectCust);
	$checkCust=mysqli_num_rows($runSeleCust);

	if ($checkCust==0) {
		echo "<script>alert('Wrong password or email, Try again!')</script>";
		exit();
	}

	$ipAddr=getIp();
	$selectCart="SELECT * FROM cart WHERE ipAddr='$ipAddr'";
	$runSelectCart=mysqli_query($conn, $selectCart);
	$checkCart=mysqli_num_rows($runSelectCart);

	if ($checkCust>0 and $checkCart==0) {
		$_SESSION['customerEmail']=$custEmail;

		echo "<script>alert('logged in successfully')</script>";
		echo "<script>window.open('customers/myAccount.php', '_self')</script>";
	}else{
		$_SESSION['customerEmail']=$custEmail;

		echo "<script>alert('logged in successfully')</script>";
		echo "<script>window.open('checkout.php', '_self')</script>";	
	}
}
?>