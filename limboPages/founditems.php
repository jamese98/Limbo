<!-- founditems.php
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
?>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css"> 
		<title>Limbo - Found Items</title>
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
						  	<li><a href="founditems.php" class="active-page">Found Items</a></li>
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
		   		<div id="items">
		   			<h1>Found Items</h1>
		   			<!-- create table -->
		   			<table class="qltable">
		   				<tr>
		   					<th>Name</th>
		   					<th>Status</th>
		   					<th>Date Reported</th>
		   					<th>Location</th>
		   				</tr>
		   			<?php
		   			# Populate table with found items
		   			show_link_records($dbc, "found");
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