<!-- manageAdmins.php
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<html>
<?php
# Required PHP files to include
require('../scripts/connect_db.php');
require('../scripts/showAdminRecords.php');
require('../scripts/inputRecord.php');

# Perform changes to database if made in table
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['deleteID'])) {
		$id = $_POST['deleteID'];
		delete_admin($dbc, $id);
		echo '<div id="content_area"><h2>Admin Deleted</h2></div>';
	} else {
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		insert_admin_record($dbc);	
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
		   			<a href="admin.php" id="mgadmin">Manage Items</a>
		   			<br/>
		   			<a href="addAdmin.php" id="mgadmin">Add Admin</a>
		   			<h1>Manage Admins</h1>
					<p>Manage administrator accounts which can manage the Limbo database</p>
					<!-- create table -->
		   			<table class="qltable">
		   				<tr>
		   					<th></th>
		   					<th>ID</th>
		   					<th>Userame</th>
		   					<th>Date Created</th>
		   				</tr>
		   			<?php
		   			# Populate table with all items from database
		   			show_admin_records($dbc);

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