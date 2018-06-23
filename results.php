<!DOCTYPE html>
<?php 
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
			  <li class="right" style="margin-top: 25px;"><a href="#about">Login/Register</a></li>
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
				<div id="shoppingCart">
					<span style="padding: 5px;line-height: 50px;">
						Welcome guest! <b style="padding-right: 5px;padding-left: 20px;">Shopping Cart:</b>Total items: Total price: <a href="cart.php" style="">Go to Cart</a>
					</span>
				</div>
				<div id="productBox">
					<?php 
						if (isset($_GET['search'])) {
							$searchQuery=$_GET['userQuery'];
							$getProduct="SELECT * FROM products WHERE productKeywords LIKE '%%$searchQuery%%'";
							$runProduct=mysqli_query($conn, $getProduct);

							while($rowProduct=mysqli_fetch_array($runProduct)){
								$productId=$rowProduct['productId'];
								$productTitle=$rowProduct['productTitle'];
								$productAuthor=$rowProduct['productAuthor'];
								$productPrice=$rowProduct['productPrice'];
								$productImage=$rowProduct['productImage'];

								echo "

									<div id='singleProduct'>
										<a href='details.php?proId=$productId'><img src='adminArea/productImages/$productImage' style='width:180px;height:220px;'/></a>
										<div style='height:48px;'>
											<h6>$productTitle</h6>
										</div>
										<h6>$productAuthor</h6>
										<h6>&#8377;$productPrice <a href='index.php?proId=$productId' style='float:right;'><button>Add to Cart</button></a></h6>
									</div>
								";
							}
						}
					?>
				</div>
			</div>
		</div>
		<div class="footer">
			<h3>hello footer</h3>
		</div>
	</div>

</body>
</html>