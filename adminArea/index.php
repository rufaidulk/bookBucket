<?php 
session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document

?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="mainWrapper">
		
		<div class="menubar w3-display-container" style="background-color: #AB3535;height: 70px;">
			<span class="w3-display-middle" style="font-size: 35px;font-family: serif;color: #FFF;">Adimin Panel</span>
		</div>
		<!--content wrapper starts here!-->
		<div class="contentWrapper">
			<div class="sidebar">
				<ul>
					<li><a href="index.php?insertPrdt">Insert New Product</a></li>
					<li><a href="index.php?viewAllPrdt">View All Products</a></li>
					<li><a href="index.php?newBranch">Add New Branch</a></li>
					<li><a href="index.php?viewBranch">View All Branches</a></li>
					<li><a href="index.php?newSem">Add New Semester</a></li>
					<li><a href="index.php?viewSem">View All Semesters</a></li>
					<li><a href="index.php?viewCust">View Customers</a></li>
					<li><a href="index.php?viewOrders">View Orders</a></li>
					<li><a href="index.php?viewPayments">View Payments</a></li>
					<li><a href="logout.php">Admin Logout</a></li>
				</ul>
			</div>
			<div class="contentArea">
				<h2 style="text-align: center;"><?php echo @$_GET['loggedIn']; ?></h2>
				<?php
				if (isset($_GET['insertPrdt'])) {
					include("insertProduct.php");
				}
				if (isset($_GET['viewAllPrdt'])) {
					include("viewProducts.php");
				}
				if (isset($_GET['edit'])) {
					include("editProduct.php");
				}
				if (isset($_GET['newBranch'])) {
					include("insertBranch.php");
				}
				if (isset($_GET['viewBranch'])) {
					include("viewBranches.php");
				}
				if (isset($_GET['editBran'])) {
					include("editBranch.php");
				}
				if (isset($_GET['newSem'])) {
					include("insertSem.php");
				}
				if (isset($_GET['viewSem'])) {
					include("viewSem.php");
				}
				if (isset($_GET['editSem'])) {
					include("editSem.php");
				}
				if (isset($_GET['viewCust'])) {
					include("viewCustomers.php");
				}
				?>
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
		}//else statement closes here
?>
