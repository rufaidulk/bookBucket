<!DOCTYPE html>
<html>
<head>
	<title>Administrator Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body style="background-color: #5EA89A;">
	<div class="mainContent">
		<div id="header">
			
		</div>
		<div id="left">
			<h3 style="text-align: center;">Manage Content</h3>

			<a href="insertProduct.php">Insert new product</a>
			<a href="index.php?viewAllPrdt">View all products</a>
			<a href="index.php?newBranch">Add new branch</a>
			<a href="index.php?viewBranch">View all branches</a>
			<a href="index.php?newSem">Add new semester</a>
			<a href="index.php?viewSem">View all semesters</a>
			<a href="index.php?viewCust">View customers</a>
			<a href="index.php?viewOrders">View orders</a>
			<a href="index.php?viewPayments">View payments</a>
			<a href="logout.php">Admin logout</a>
		</div>
		<div id="right">
			<?php
			if (isset($_GET['viewAllPrdt'])) {
				include("viewProducts.php");
			}
			?>
		</div>
	</div>

</body>
</html>