<!-- admin.php
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<html>
<?php
# Required PHP files to include
require('../scripts/connect_db.php');
require('../scripts/limboFunctions.php');
require('../scripts/showLinkRecords.php');

# Perform changes to database if made in table
if($_SERVER['REQUEST_METHOD'] == 'POST') {
		# Delete an item from the database
		if(isset($_POST['deleteID'])) {
			$id = $_POST['deleteID'];
			delete_item($dbc, $id);
			echo '<div id="content_area"><h2>Item Deleted</h2></div>';
		# Update the status of an item if it is changed
		} else if(isset($_POST['updateID'])) {
			$id = $_POST['updateID'];
			$status = $_POST['status'];
			update_status($dbc, $id, $status);
			echo '<div id="content_area"><h2>Item Updated</h2></div>';
		}
	}   			
?>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css">
		<title>Limbo - Admin</title>
	</head>
	<body>
		<body>
		<!-- container -->
		<div id="container">
			<!--  header -->
			<div id="header">
				<div id="header-content">
					<div id="logo"><span title="Home"><a href="home.php"><img src="limbologo.png"></a></span></div>
		  			<div class="navbar">
			   			<ul>
						  	<li><a href="founditems.php">Found Items</a></li>
						 	<li><a href="lostitems.php">Lost Items</a></li>
						 	<li class="dropdown"><a href="#" class="dropbtn">Report an Item</a>
						  	<div class="dropdown-content">
						  		<a href="reportlost.php">Lost</a>
						  		<a href="reportfound.php">Found</a>
						  	</div>
						  	</li>
						  	<li class="adminlink active-page"><a href="adminLogin.php">Admin</a></li>
						</ul>
					</div>
				</div>
			</div>
	  		<!-- content area -->
	  		<div id="content_area">
		   		<div id="items">
		   			<h1>Admin Page</h1>
					<p> Edit and remove records within the Limbo database</p>
					<!-- create table -->
		   			<table class="qltable">
		   				<tr>
		   					<th></th>
		   					<th>ID</th>
		   					<th>Name</th>
		   					<th>Status</th>
		   					<th>Date Reported</th>
		   					<th>Date Updated</th>
		   					<th>Location</th>
		   				</tr>
		   			<?php
		   			# Populate table with all items from database
		   			show_link_records($dbc, "admin");

		   			# Close database connection
		   			mysqli_close($dbc);
		   			?>
		   			</table>
	   			 </div>
   			 	<!-- footer -->
	  			<div id="footer"></div>
  			<!-- end container -->
   			 </div>
		 </div>
	</body>
</html>