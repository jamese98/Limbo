<!-- viewitem.php
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<html>
<?php
# Connect to MySQL server/database
require('../scripts/connect_db.php');
# Include helper functions
require('../scripts/limboFunctions.php');
require('../scripts/showRecord.php');
?>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css"> 
		<title>Limbo - Item Details</title>
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
						  	<li class="adminlink"><a href="adminLogin.php">Admin</a></li>
						</ul>
					</div>
				</div>
			</div>
	  		<!-- content area -->
	  		<div id="content_area">
		   		<div id="iteminfo">
		   			<h1>Item Info</h1>
		   			<?php
		   			# Display information for specified item
		   			if($_SERVER['REQUEST_METHOD'] == 'GET') {
		   				if(isset($_GET['id'])) {
		   					show_record($dbc, $_GET['id']);
	   						$status = check_status($dbc, $_GET['id']); 
			   				// update_status($dbc, $_GET['id'], $status);
		   				}
		   	// 			if($_SERVER['REQUEST_METHOD'] == 'POST') 
		   	// 				if(isset($_POST['id'])) {
						// 		$id = $_POST['id'];
						// 		$status = $_POST['status'];
						// 		update_status($dbc, $id, $status);
						// 		echo '<div id="content_area"><h2>Item Updated</h2></div>';
						// 	}
						// }
		   			}
		   			#Close database connection
		   			mysqli_close($dbc);
		   			?>
				  	<br/><br/>
					<form>
		   				<input id="button" method="POST" type="Submit" value="Claim">
		   			</form>
	  			</div>
	  		</div>
	  		<!-- footer -->
			<div id="footer"></div>
	  	</div>
  	</body>
</html>