<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/loginStyles.css"/>
</head>
<body>

	<div class="login">
		<h2 style="color: #FFF;text-align: center;"><?php echo @$_GET['notAdmin']; ?></h2>
		<h2 style="color: #FFF;text-align: center;"><?php echo @$_GET['loggedOut']; ?></h2>
		<h1>Admin Login</h1>
	    <form method="post">
	    	<input type="text" name="email" placeholder="Username" required="required" />
	        <input type="password" name="passwd" placeholder="Password" required="required" />
	        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Let me in.</button>
	    </form>
	</div>
</body>
</html>
<?php
include("includes/config.php");

if (isset($_POST['login'])) {
	
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$passwd=mysqli_real_escape_string($conn, $_POST['passwd']);

	$selUser="SELECT * FROM admins WHERE userEmail='$email' AND userPasswd='$passwd'";
	$runUser=mysqli_query($conn, $selUser);
	$checkUser=mysqli_num_rows($runUser);

	if ($checkUser==0) {
		echo "<script>alert('Password or Email is incorrect, Try again')</script>";
	}else{
		$_SESSION['userEmail']=$email;

		echo "<script>window.open('index.php?loggedIn=You are logged in successfully')</script>";
	}
}
?>