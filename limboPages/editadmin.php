<!-- editadmin.php
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<html>
<?php
# Connect to MySQL server/database
require('../scripts/connect_db.php');
# Include helper functions
require('../scripts/showAdmin.php');
require('../scripts/limboFunctions.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	#gets the uopdateID from the form
	$id = $_POST['updateID'];
	#gets the username value from the form
	$username = $_POST['username'];
	#gets the password value from the form
	$password = $_POST['password1'];
	// runs the update admin to update the record
	update_admin($dbc, $id, $username, $password);
}
?>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css"> 
		<title>Limbo - Edit Admin</title>
	</head>
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
		   		<div id="iteminfo">
		   			<a href="manageAdmins.php" id="mgadmin">< All Admins</a>
		   			<h1>Edit Admin</h1>
		   			<?php
		   			# Display information for specified item
		   			if($_SERVER['REQUEST_METHOD'] == 'GET') {
		   				if(isset($_GET['id'])) {
		   					show_admin($dbc, $_GET['id']);
		   				}
		   			} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
		   				show_admin($dbc, $id);
		   			}

		   			#Close database connection
		   			mysqli_close($dbc);
		   			?>
	  			</div>
	  		</div>
	  		<!-- footer -->
			<div id="footer"></div>
	  	</div>
  	</body>
</html>