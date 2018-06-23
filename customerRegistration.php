<!DOCTYPE html>
<?php
	session_start(); 
	include("functions/functions.php");
	include("include/config.php");
?>
<html>
<head>
	<title>BookBucket</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="mainWrapper">
		<div class="headerWrapper">
			<ul class="topnav">
			  <li ><a href="#home" style="padding: 0px"><img id="logo" src="images/logo.gif" /></a></li>
			  <li>
			  	<div class="searchBox">
			        <form action="results.php" method="GET" enctype="multipart/form-data">
			        	<input type="text" id="search" name="userQuery" placeholder="Search a book" />
				        <input type="submit" name="search" value="Search" class="fa fa-search w3-white w3-border w3-border-red w3-round-large" 
				          style="height: 50px;width:70px;background-color: #FFF;">
			        </form>
				</div>
			  </li>
			  <li class="right" style="margin-top: 25px;">
			  	<?php 
						if (!isset($_SESSION['customerEmail'])) {
							echo "<a href='checkout.php'>Log in/Register</a>";
						}
					?>
			  </li>
			  <li class="right"><h3>Hi user!</h3></li>
			</ul>
		</div>
		<div class="menubar">
			<ul>
			  <li style="margin-left: 30px;"><a href="index.php">Home</a></li>
			  <li><a href="allProducts.php">All Products</a></li>
			  <li><a href="#contact">Blog</a></li>
			  <li><a href="#about">Contact Us</a></li>
			</ul>
		</div>
		<!--content wrapper starts here!-->
		<div class="contentWrapper">
			<div class="sidebar">
				<div id="sidebarTitle"><b>Branch</b></div>
				<ul id="branch">
					<?php echo getBranch(); ?>
				</ul>
				<div id="sidebarTitle"><b>Semester</b></div>
				<ul id="semester">
					<?php echo getSemester(); ?>
				</ul>
			</div>
			<div class="contentArea">
				<?php cart(); ?>
				<div id="shoppingCart">
					<span style="padding: 5px;line-height: 50px;">
						<b style="padding-right: 5px;padding-left: 20px;">Shopping Cart:</b>Total items:<?php totalItems();?> Total price:<?php totalPrice(); ?> <a href="cart.php" style="">Go to Cart</a>
					</span>
				</div>
				<form method="POST" action="customerRegistration.php" enctype="multipart/form-data">
					<table>
						<tr><h3>Create an Account</h3></tr>
						<tr>
							<td>Name:</td>
							<td><input type="text" name="custName"/></td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td><input type="text" name="custEmail"/></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="custPasswd"/></td>
						</tr>
						<tr>
							<td>Image:</td>
							<td><input type="file" name="custImage"/></td>
						</tr>
						<tr>
							<td>Country:</td>
							<td><input type="text" name="custCountry"/></td>
						</tr>
						<tr>
							<td>City:</td>
							<td><input type="text" name="custCity"/></td>
						</tr>
						<tr>
							<td>Contact:</td>
							<td><input type="text" name="custContact"/></td>
						</tr>
						<tr>
							<td>Address:</td>
							<td><textarea cols="20" rows="10" name="custAddr"></textarea>
						</tr>
						<tr align="center">
							<td><input type="submit" name="register" value="Register" class="w3-button w3-round-large" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="footer">
			<footer class="w3-padding-64 w3-small w3-center" id="footer">
			    <div class="w3-row-padding">
			      <div class="w3-col s4">
			        <h4>Contact</h4>
			        <p>Questions? Go ahead.</p>
			        <form action="/action_page.php" target="_blank">
			          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
			          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
			          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
			          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
			          <button type="submit" class="w3-button w3-block w3-black">Send</button>
			        </form>
			      </div>

			      <div class="w3-col s4">
			        <h4>About</h4>
			        <p><a href="#">About us</a></p>
			        <p><a href="#">We're hiring</a></p>
			        <p><a href="#">Support</a></p>
			        <p><a href="#">Find store</a></p>
			        <p><a href="#">Shipment</a></p>
			        <p><a href="#">Payment</a></p>
			        <p><a href="#">Gift card</a></p>
			        <p><a href="#">Return</a></p>
			        <p><a href="#">Help</a></p>
			      </div>

			      <div class="w3-col s4 w3-justify">
			        <h4>Store</h4>
			        <p><i class="fa fa-fw fa-map-marker"></i> BookBucket</p>
			        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
			        <p><i class="fa fa-fw fa-envelope"></i> bookbucket@mail.com</p>
			        <h4>We accept</h4>
			        <p><i class="fa fa-fw fa-cc-amex"></i> Paypal</p>
			        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
			        <br>
			        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
			        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
			        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
			        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
			        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
			        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
			      </div>
			    </div>
			  </footer>

			  <div class="w3-black w3-center w3-padding-24">&copy; Bookbucket Inc.</div>

			  
			</div>

		</div>
		<!-- End footer -->
	</div>

</body>
</html>
<?php 
if (isset($_POST['register'])) {
	
	$ipAddr=getIp();

	$custName=$_POST['custName'];
	$custEmail=$_POST['custEmail'];
	$custPasswd=$_POST['custPasswd'];
	$custCountry=$_POST['custCountry'];
	$custCity=$_POST['custCity'];
	$custContact=$_POST['custContact'];
	$custAddr=$_POST['custAddr'];

	$custImage=$_FILES['custImage']['name'];
	$custImageTemp=$_FILES['custImage']['tmpName'];

	//write the code for uploading files to system folder

	$insertCustData="INSERT INTO customers (customerIp, customerName, customerEmail, customerPasswd, customerImage, customerCountry, customerCity, customerContact, customerAddr) VALUES ('$ipAddr', '$custName', '$custEmail', '$custPasswd', '$custImage', '$custCountry', '$custCity', '$custContact', '$custAddr')";
	$runInsertCustData=mysqli_query($conn, $insertCustData);

	$selectCart="SELECT * FROM cart WHERE ipAddr='$ipAddr'";
	$runSelectCart=mysqli_query($conn, $selectCart);
	$checkCart=mysqli_num_rows($runSelectCart);

	if ($checkCart==0) {
		$_SESSION['customerEmail']=$custEmail;

		echo "<script>alert('Account has been created successfully')</script>";
		echo "<script>window.open('customers/myAccount.php', '_self')</script>";
	}else{
		$_SESSION['customerEmail']=$custEmail;

		echo "<script>alert('Account has been created successfully')</script>";
		echo "<script>window.open('checkout.php', '_self')</script>";
	}
}
?>