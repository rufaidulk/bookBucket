<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
	echo "<script>window.open('login.php?notAdmin=You are not an admin', '_self')</script>";

}else{//closing braces at the bottom of the document

?>
<div class="table-responsive">
	<table class="table">
		<tr>
			<h3 style="text-align: center;">List of semesters</h3>
		</tr>
		<tr align="center">
			<th>S.No</th>
			<th>Semester Id</th>
			<th>Semester Name</th>
		</tr>
		<?php
		include("includes/config.php");

		$getSem="SELECT * FROM semester";
		$runSem=mysqli_query($conn, $getSem);

		$i=0;

		while ($rowSem=mysqli_fetch_array($runSem)) {
			$semId=$rowSem['semesterId'];
			$semName=$rowSem['semesterName'];
			$i++;

		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $semId; ?></td>
			<td><?php echo $semName; ?></td>
			<td><a href="index.php?editSem=<?php echo $semId; ?>" style="text-decoration: none;">Edit</a></td>
			<td><a href="deleteSem.php?delSem=<?php echo $semId; ?>" style="text-decoration: none;">Delete</a></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>

<?php 

}// session else statement closes here

?>