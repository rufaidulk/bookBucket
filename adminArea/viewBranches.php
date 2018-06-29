<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document

?>
<div class="table-responsive">
	<table class="table">
		<tr>
			<h3 style="text-align: center;">List of branches</h3>
		</tr>
		<tr align="center">
			<th>S.No</th>
			<th>Branch Id</th>
			<th>Branch Name</th>
		</tr>
		<?php
		include("includes/config.php");

		$getBran="SELECT * FROM branch";
		$runPro=mysqli_query($conn, $getBran);

		$i=0;

		while ($rowBran=mysqli_fetch_array($runPro)) {
			$branId=$rowBran['branchId'];
			$branName=$rowBran['branchName'];
			$i++;

		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $branId; ?></td>
			<td><?php echo $branName; ?></td>
			<td><a href="index.php?editBran=<?php echo $branId; ?>" style="text-decoration: none;">Edit</a></td>
			<td><a href="deleteBranch.php?delBran=<?php echo $branId; ?>" style="text-decoration: none;">Delete</a></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>

<?php

}// session else statement closes here

?>