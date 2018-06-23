<?php
include("include/config.php");

$email=$_SESSION['customerEmail'];

$selectCust="SELECT * FROM customers WHERE customerEmail='$email'";
$runCust=mysqli_query($conn, $selectCust);
$rowCust=mysqli_fetch_array($runCust);

$custId=$rowCust['customerId'];
$name=$rowCust['customerName'];
$image=$rowCust['customerImage'];
$country=$rowCust['customerCountry'];
$city=$rowCust['customerCity'];
$contact=$rowCust['customerContact'];
$addr=$rowCust['customerAddr'];


?>

				<form method="POST" action="" enctype="">
					<table>
						<tr><h3>Edit your Account</h3></tr>
						<tr>
							<td>Name:</td>
							<td><input type="text" name="custName" value="<?php echo $name;?>"/></td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td><input type="text" name="custEmail" value="<?php echo $email;?>"/></td>
						</tr>
						<tr>
							<td>Image:</td>
							<td><input type="file" name="custImage"/ disabled></td>
						</tr>
						<tr>
							<td>Country:</td>
							<td><input type="text" name="custCountry" value="<?php echo $country;?>"/></td>
						</tr>
						<tr>
							<td>City:</td>
							<td><input type="text" name="custCity" value="<?php echo $city;?>"/></td>
						</tr>
						<tr>
							<td>Contact:</td>
							<td><input type="text" name="custContact" value="<?php echo $contact;?>"/></td>
						</tr>
						<tr>
							<td>Address:</td>
							<td><textarea cols="20" rows="10" name="custAddr"><?php echo $addr;?></textarea>
						</tr>
						<tr align="center">
							<td><input type="submit" name="update" value="Update" class="w3-button w3-round-large"/></td>
						</tr>
					</table>
				</form>
			
<?php 
if (isset($_POST['update'])) {
	
	//$ipAddr=getIp();

	//$custId=

	$custName=$_POST['custName'];
	$custEmail=$_POST['custEmail'];
	$custCountry=$_POST['custCountry'];
	$custCity=$_POST['custCity'];
	$custContact=$_POST['custContact'];
	$custAddr=$_POST['custAddr'];

	//$custImage=$_FILES['custImage']['name'];
	//$custImageTemp=$_FILES['custImage']['tmpName'];

	//write the code for uploading files to system folder

	$updateCustData="UPDATE customers SET customerName='$custName', customerEmail='$custEmail', customerCountry='$custCountry', customerCity='$custCity', customerContact='$custContact', customerAddr='$custAddr' WHERE customerId='$custId'";
	$runUpdateCustData=mysqli_query($conn, $updateCustData);

	if ($runUpdateCustData) {
		echo "<script>alert('Your account updated successfully!')</script>";
		echo "<script>window.open('myAccount.php', '_self')</script>";
	}
}
?>