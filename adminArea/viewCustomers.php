<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document

?>
<div class="table-responsive">
	<table class="table">
		<tr>
			<h3 style="text-align: center;">List of customers</h3>
		</tr>
		<tr align="center">
			<th>S.No</th>
			<th>Customer Id</th>
			<th>Customer Name</th>
			<th>Customer Email</th>
			<th>Customer Image</th>
			<th>Delete</th>
		</tr>
		<?php
		include("includes/config.php");

		$getCust="SELECT * FROM customers";
		$runCust=mysqli_query($conn, $getCust);

		$i=0;

		while ($rowCust=mysqli_fetch_array($runCust)) {
			$custId=$rowCust['customerId'];
			$custName=$rowCust['customerName'];
			$custEmail=$rowCust['customerEmail'];
			$custImage=$rowCust['customerImage'];

			$i++;

		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $custId; ?></td>
			<td><?php echo $custName; ?></td>
			<td><?php echo $custEmail; ?></td>
			<td><?php echo "<img src='../customers/customerImages/$custImage' style='width:80px;height:80px;'/>"; ?></td>
			<td><a href="deleteCust.php?delCust=<?php echo $custId; ?>" style="text-decoration: none;">Delete</a></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>
<?php

}// session else statement closes here

?>