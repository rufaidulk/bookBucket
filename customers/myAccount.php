<!DOCTYPE html>
<?php 
	session_start();
	include("functions/functions.php");
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
					if (isset($_SESSION['customerEmail'])) {
						echo "<a href='../logout.php'>Log out</a>";
					}
				?>
			  </li>
			  <li class="right" style="color: #FFF;margin-top: 40px;">
			  	<?php
					if (isset($_SESSION['customerEmail'])) {
						echo "Welcome ".$_SESSION['customerEmail'];
					}
				?>
			  </li>
			</ul>
		</div>
		<div class="menubar">
			<ul>
			  <li style="margin-left: 30px;"><a href="../index.php">Home</a></li>
			  <li><a href="allProducts.php">All Products</a></li>
			  <li><a href="#contact">Blog</a></li>
			  <li><a href="#about">Contact Us</a></li>
			</ul>
		</div>
		<!--content wrapper starts here!-->
		<div class="contentWrapper">
			<div class="sidebar">
				<div id="sidebarTitle"><b>My Account</b></div>
				<?php
				$user=$_SESSION['customerEmail'];
				$getImage="SELECT * FROM customers WHERE customerEmail='$user'";
				$runImage=mysqli_query($conn, $getImage);
				$rowImage=mysqli_fetch_array($runImage);
				$userImage=$rowImage['customerImage'];
				$userName=$rowImage['customerName'];

				if (!$runImage) {
				    printf("Error: %s\n", mysqli_error($conn));
				    exit();
				}

				echo "<img src='customerImages/$userImage'/>";
				?>
				<ul id="branch">
					<li><a href="myAccount.php?myOrders" style="text-decoration:none;">My orders</a></li>
					<LI><a href="myAccount.php?editAcct" style="text-decoration:none;">Edit Account</a></LI>
					<li><a href="myAccount.php?changePasswd" style="text-decoration:none;">Change Passsword</a></li>
					<li><a href="myAccount.php?delAcct" style="text-decoration:none;">Delete Account</a></li>
				</ul>
			</div>
			<div class="contentArea">
				<?php cart(); ?>
				<div id="shoppingCart">
					<span style="padding: 5px;line-height: 50px;">
						
						
					</span>
				</div>
				<div id="productBox">

					<?php
						if (!isset($_GET['myOrders'])) {
						 	if (!isset($_GET['editAcct'])) {
						 		if (!isset($_GET['changePasswd'])) {
						 			if (!isset($_GET['delAcct'])) {
						 				echo "<h2>Welcome $userName</h2>";
						 			}
						 		}
						 	}
						 } 
						if (isset($_GET['editAcct'])) {
							include("editAccount.php");
						}
						if (isset($_GET['changePasswd'])) {
							include("changePasswd.php");
						}
						if (isset($_GET['delAcct'])) {
							include("delAccount.php");
						}
					?>
				</div>
			</div>
		</div>
		<br>
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