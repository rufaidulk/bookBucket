<!DOCTYPE html>
<?php 
include("includes/config.php");

if (isset($_GET['edit'])) {
	
	$getId=$_GET['edit'];

	$getPro="SELECT * FROM products WHERE productId='$getId'";
	$runPro=mysqli_query($conn, $getPro);

	$rowPro=mysqli_fetch_array($runPro);

	$productTitle=$rowPro['productTitle'];
	$productBranch=$rowPro['productBranch'];
	$productSemester=$rowPro['productSem'];
	$productSubject=$rowPro['productSubj'];
	$productAuthor=$rowPro['productAuthor'];
	$productPrice=$rowPro['productPrice'];
	$productDesc=$rowPro['productDesc'];
	$productKeywords=$rowPro['productKeywords'];

	$productImage=$rowPro['productImage'];

}

?>
<html>
<head>
	<title>Update books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>
	        tinymce.init({selector:'textarea'});
	</script>
</head>
<body>
	<div class="container" style="margin-top: 20px;">
		<form action="insertProduct.php" method="POST" enctype="multipart/form-data" >
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td>Book title</td>
							<td><input type="text" name="productTitle" size="60" required="required" value="<?php echo $productTitle; ?>" /></td>
						</tr>
						<tr>
							<td>Course Branch</td>
							<td>
								<select name="productBranch" required="required" id="productBranch" onChange="getSelectedBranch()">
									<option><?php echo $productBranch; ?></option>
									<?php
									$getBranch="SELECT * FROM branch";
									$runBranch=mysqli_query($conn, $getBranch);

									while ($rowBranch=mysqli_fetch_array($runBranch)) {
										$branchId=$rowBranch['branchId'];
										$branchName=$rowBranch['branchName'];
										
										echo "<option value='$branchId'>$branchName</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Course Semester</td>
							<td>
								<select name="productSemester" id="productSemester" required="required" onChange="getSelectedSemester()">
									<option><?php echo $productSemester; ?></option>
									<?php
									$getSemester="SELECT * FROM semester";
									$runSemester=mysqli_query($conn, $getSemester);

									while ($rowSemester=mysqli_fetch_array($runSemester)) {
										$semesterId=$rowSemester['semesterId'];
										$semesterName=$rowSemester['semesterName'];
										
										echo "<option value='$semesterId'>$semesterName</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Book Subject Name:</td>
							<td><input type="text" name="productSubject" placeholder="Enter subject name as same as in syllabus" value="<?php echo $productSubject; ?>"></td>
						</tr>
						<tr>
							<td>Book Author Name:</td>
							<td><input type="text" name="productAuthor" placeholder="Author name" value="<?php echo $productAuthor; ?>"></td>
						</tr>
						<tr>
							<td>Book Image:</td>
							<td><input type="file" name="productImage" value="<?php echo $productImage; ?>"></td>
						</tr>
						<tr>
							<td>Book Price:</td>
							<td><input type="text" name="productPrice" value="<?php echo $productPrice; ?>"></td>
						</tr>
						<tr>
							<td>Book Description:</td>
							<td><textarea name="productDesc" cols="20" rows="10" ><?php echo $productDesc; ?></textarea></td>
						</tr>
						<tr>
							<td>Book Keywords:</td>
							<td><input type="text" name="productKeywords" placeholder="e.g:author name " value="<?php echo $productKeywords; ?>"></td>
						</tr>
						<tr align="center" >
							<td><input type="submit" name="insertProduct" value="Update Product Now" class="w3-button w3-round-large" style="height: 50px;width: 250px;font-size: 18px;"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
	</div>

<script type='text/javascript'>
    `
</script>

</body>
</html>
<?php
	if (isset($_POST['insertProduct'])) {
		//getting the book data from text fields
		$productTitle=$_POST['productTitle'];
		$productBranch=$_POST['productBranch'];
		$productSemester=$_POST['productSemester'];
		$productSubject=$_POST['productSubject'];
		$productAuthor=$_POST['productAuthor'];
		$productPrice=$_POST['productPrice'];
		$productDesc=$_POST['productDesc'];
		$productKeywords=$_POST['productKeywords'];

		$productImage=$_FILES['productImage']['name'];
		$productImageTmp=$_FILES['productImage']['tmpName'];

		//need to give permission to php to write in root folder
		$uploadDir='/opt/lampp/htdocs/bookbucket/adminArea/productImages/';
		$uploadfile = $uploadDir . basename($_FILES['productImage']['name']);
		if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadfile)) {
	      echo "File is valid, and was successfully uploaded.\n";
	    } else {
	       echo "Upload failed";
	    }

		$insertProduct="INSERT INTO products (productBranch, productSem, productSubj, productTitle, productAuthor, productPrice, productDesc, productKeywords, productImage) VALUES ('$productBranch', '$productSemester', '$productSubject', '$productTitle', '$productAuthor', '$productPrice', '$productDesc', '$productKeywords', '$productImage')";
		$insertPro=mysqli_query($conn, $insertProduct);

		if ($insertPro) {
			echo "<script>alert('Product has been inserted!')</script>";
			echo "<script>window.open('insertProduct.php','_self')</script>";//page refreshment for avoiding the chance of double insertion
		}
	}
?>