<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document

?>
<div class="table-responsive">
	<table class="table">
		<tr>
			<h3 style="text-align: center;">List of products</h3>
		</tr>
		<tr align="center">
			<th>S.No</th>
			<th>Title</th>
			<th>Image</th>
			<th>Price</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		include("includes/config.php");

		$getPro="SELECT * FROM products";
		$runPro=mysqli_query($conn, $getPro);

		$i=0;

		while ($rowPro=mysqli_fetch_array($runPro)) {
			$proId=$rowPro['productId'];
			$title=$rowPro['productTitle'];
			$image=$rowPro['productImage'];
			$price=$rowPro['productPrice'];
			$i++;

		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $title; ?></td>
			<td><?php echo "<img src='productImages/$image' style='width:80px;height:80px;'/>"; ?></td>
			<td><?php echo "$".$price; ?></td>
			<td><a href="index.php?edit=<?php echo $proId; ?>" style="text-decoration: none;">Edit</a></td>
			<td><a href="deleteProduct.php?del=<?php echo $proId; ?>" style="text-decoration: none;">Delete</a></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>

<?php

}// session else statement closes here

?>