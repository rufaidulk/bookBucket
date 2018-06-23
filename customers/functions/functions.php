<?php
$conn=mysqli_connect("localhost","root","","bookBucket");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
//shopping cart
function cart(){
	global $conn;

	if (isset($_GET['addCart'])) {
		$productId=$_GET['addCart'];

		$ipAddr=getIp();

		$checkPro="SELECT * FROM cart WHERE ipAddr='$ipAddr' AND productId='$productId'";
		$runCheckPro=mysqli_query($conn, $checkPro);

		if (mysqli_num_rows($runCheckPro)>0) {
			echo "";
		}else{
			$insertProduct="INSERT INTO cart (productId, ipAddr) VALUES ('$productId', '$ipAddr')";
			$runProduct=mysqli_query($conn, $insertProduct);

			echo "<script>window.open('index.php', '_self')</script>";
		}
	}
}
//getting total items in; the cart
function totalItems(){
	if (isset($_GET['addCart'])) {
		global $conn;
		$ipAddr=getIp();

		$getItems="SELECT * FROM cart WHERE ipAddr='$ipAddr'";
		$runGetItems=mysqli_query($conn, $getItems);

		$countItems=mysqli_num_rows($runGetItems);
	}else{

		global $conn;
		$ipAddr=getIp();

		$getItems="SELECT * FROM cart WHERE ipAddr='$ipAddr'";
		$runGetItems=mysqli_query($conn, $getItems);

		$countItems=mysqli_num_rows($runGetItems);
	}

	echo $countItems;
}
//getting total price 
function totalPrice(){
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

			$value=array_sum($productPrice);
			$total+=$value;

		}
	}
	echo "$".$total;
}
//getting branches
function getBranch(){
	global $conn;

	$getBranch="SELECT * FROM branch";
	$runBranch=mysqli_query($conn, $getBranch);

	while ($rowBranch=mysqli_fetch_array($runBranch)) {
		$branchId=$rowBranch['branchId'];
		$branchName=$rowBranch['branchName'];
		
		echo "<li><a href='index.php?branch=$branchId' style='text-decoration: none;'>$branchName</a></li>";
	}
}
//getting semesters
function getSemester(){
	global $conn;

	$getSemester="SELECT * FROM semester";
	$runSemester=mysqli_query($conn, $getSemester);

	while ($rowSemester=mysqli_fetch_array($runSemester)) {
		$semesterId=$rowSemester['semesterId'];
		$semesterName=$rowSemester['semesterName'];
		
		echo "<li><a href='index.php?sem=$semesterId' style='text-decoration: none;'>$semesterName</a></li>";
	}
}
//getting products
function getProduct(){
	if (!isset($_GET['branch'])) {
		if (!isset($_GET['sem'])) {
			global $conn;
			$getProduct="SELECT * FROM products ORDER BY RAND() LIMIT 0,8";
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
						<h6>&#8377;$productPrice <a href='index.php?addCart=$productId' style='float:right;'><button>Add to Cart</button></a></h6>
					</div>
				";
			}
		}
	}
}
//getting branch wise products
function getBranchPro(){
	if (isset($_GET['branch'])) {
		$branchId=$_GET['branch'];
		global $conn;
		$getBranchProduct="SELECT * FROM products WHERE productBranch=$branchId";
		$runBranchProduct=mysqli_query($conn, $getBranchProduct);
		$countBranch=mysqli_num_rows($runBranchProduct);

		if ($countBranch==0) {
			echo "<h3>There is no books for this branch</h3>";
			exit();
		}

		while($rowBranchProduct=mysqli_fetch_array($runBranchProduct)){
			$productId=$rowBranchProduct['productId'];
			$productTitle=$rowBranchProduct['productTitle'];
			$productAuthor=$rowBranchProduct['productAuthor'];
			$productPrice=$rowBranchProduct['productPrice'];
			$productImage=$rowBranchProduct['productImage'];

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
}
//getting semester wise products
function getSemPro(){
	if (isset($_GET['sem'])) {
		$semId=$_GET['sem'];
		global $conn;
		$getSemProduct="SELECT * FROM products WHERE productBranch=$semId";
		$runSemProduct=mysqli_query($conn, $getSemProduct);
		$countSem=mysqli_num_rows($runSemProduct);

		if ($countSem==0) {
			echo "<h3>There is no books for this semester</h3>";
			exit();
		}

		while($rowSemProduct=mysqli_fetch_array($runSemProduct)){
			$productId=$rowSemProduct['productId'];
			$productTitle=$rowSemProduct['productTitle'];
			$productAuthor=$rowSemProduct['productAuthor'];
			$productPrice=$rowSemProduct['productPrice'];
			$productImage=$rowSemProduct['productImage'];

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
}







?>