<table bgcolor="#FFF" width="795px">
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
		<td><a href="index.php?edit">Edit</a></td>
		<td><a href="deleteProduct.php">Delete</a></td>
	</tr>
	<?php
	}
	?>
</table>