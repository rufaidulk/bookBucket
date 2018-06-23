<?php 
	session_start();
	include("functions/functions.php");
?>
<!DOCTYPE html>
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
					}else{
						echo "<a href='logout.php'>Log out</a>";
					}
				?>
			  </li>
			  <li class="right" style="color: #FFF;margin-top: 40px;">
			  	<?php
					if (isset($_SESSION['customerEmail'])) {
						echo "Welcome ".$_SESSION['customerEmail'];
					}else{
						echo "Hi user!";
					}
				?>
			  </li>
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
						<b style="padding-right: 5px;padding-left: 20px;">Shopping Cart:</b>Total items:<?php totalItems();?> Total price:<?php totalPrice(); ?> <a href="index.php" style="">back to shop</a>
					</span>
				</div>
				<div id="productBox">
					<form method="POST" action="cart.php" enctype="multipart/form-data">
						<table width="700px" bgcolor="#FFF">
							<tr>
								<th>Remove</th>
								<th>Product(s)</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
							<?php 
								global $conn;
								$total=0;
								$ipAddr=getIp();

								$selectProduct="SELECT * FROM cart WHERE ipAddr='$ipAddr'";
								$runSelectPro=mysqli_query($conn, $selectProduct);

								while ($rowProduct=mysqli_fetch_array($runSelectPro)) {
									$productId=$rowProduct['productId'];
									$selectPrice="SELECT * FROM products WHERE productId='$productId'";
									$runProPrice=mysqli_query($conn, $selectPrice);

									while ($rowPrice=mysqli_fetch_array($runProPrice)) {
										$productPrice=array($rowPrice['productPrice']);
										$productTitle=$rowPrice['productTitle'];
										$productImage=$rowPrice['productImage'];
										$singleProPrice=$rowPrice['productPrice'];
										$productId=$rowPrice['productId'];

										$values=array_sum($productPrice);
										$total+=$values;
								
							?>
							<tr align="center">
								<td><input type="checkbox" name="remove[]" value="<?php echo $productId; ?>"/></td>
								<td><?php echo $productTitle;?><br>
									<img src="adminArea/productImages/<?php echo $productImage;?>" width="180px" height="220px">
								</td>
								<td><input type="text" size="3" name="qntity" value="<?php echo $_SESSION['qntity'];?>" /></td>
								<?php
									/*if (isset($_POST['updateCart'])) {
										$qntity=$_POST['qntity'];
										$updateQntity="UPDATE cart SET qntity=5 WHERE productId='$productId'";
										$runQntity=mysqli_query($conn, $updateQntity);

										$_SESSION['qntity']=$qntity;

										$total=$total*$qntity;
										
									}*/
								?>
								<td><?php echo "$".$singleProPrice;?></td>
							</tr>
							<?php 
									}
								}
							?>
							<tr align="right">
								<td colspan="3"><b>Sub Total:</b></td>
								<td><?php echo "$".$total;?></td>
							</tr>
							<tr align="center">
								<td colspan="2"><input type="submit" name="updateCart" value="Update Cart" class="w3-button w3-round-large"    style="cursor:pointer;width: 120px;float: left;"/></td>
								<td><input type="submit" name="continue" value="Continue Shopping" class="w3-button w3-round-large" style="cursor:pointer;width: 170px;text-align: center;margin-right: 90px;"/></td>
								<td><button onclick="location.href='checkout.php'" type="button" class="w3-button w3-round-large" style="cursor:pointer;">Checkout</button></td>
							</tr>
						</table>
					</form>
					<?php 
						$ipAddr=getIp();


						if (isset($_POST['updateCart'])) {
							if (isset($_POST['remove'])) {

								foreach ($_POST['remove'] as $removeId) {
									$deletePro="DELETE FROM cart WHERE productId='$removeId' AND ipAddr='$ipAddr'";
									$runDelete=mysqli_query($conn, $deletePro);

									if ($runDelete) {
										echo "<script>window.open('cart.php', '_self')</script>";
									}
								}
							}
						}
						if (isset($_POST['continue'])) {
							echo "<script>window.open('index.php','_self')</script>";
						}
					?>
				</div>
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
	</div>
	<!-- End footer -->
	</div>

</body>
</html>