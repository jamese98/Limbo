<!-- home.html
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<html>
<?php
# Required PHP files to include
require('../scripts/connect_db.php');
require('../scripts/limboFunctions.php');
require('../scripts/showQuicklinkRecords.php');
?>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css"> 
		<title>Limbo - Home</title>
	</head>
	<body>
		<!-- container -->
		<div id="container">
			<!--  header -->
			<div id="header">
				<div id="header-content">
					<!-- logo/home link -->
					<div id="logo"><span title="Home"><a href="home.php"><img src="limbologo.png"></a></span></div>
					<!-- navbar -->
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
				<!-- homepage welcome message/title -->
				<div id="banner">
					<h1>Limbo</h1>
					<p>Marist College Lost and Found</p>
				</div>
				<!-- recently found/lost items on landing page -->
				<div id=quicktables>
					<div id="recentfound">
			   			<h1>Recently Found Items</h1>
			   			<table class="qltable">
						  <tr>
						    <th>Item</th>
						    <th>Status</th> 
						    <th>Date Reported</th>
						    <th>Location</th>
						  </tr>
			   				<?php
			   				#Populate recently found items table
			   				show_quicklink_records($dbc, "found");
			   				?>
						</table>
					</div>
					<div id="recentlost">
			   			<h1>Recently Lost Items</h1>
			   			<table class="qltable">
						  <tr>
						    <th>Item</th>
						    <th>Status</th> 
						    <th>Date Reported</th>
						    <th>Location</th>
						  </tr>
						 	<?php
						 	#Populate recently lost items table
						 	show_quicklink_records($dbc, "lost");

						 	# Close the database connection
						 	mysqli_close($dbc);
						 	?>
						</table>
		   			</div>
		   		</div>
		   	</div>
		</div>
			<!-- footer -->
			<div id="footer">
				<div id="footer-content">
					<p><a href= http://www.marist.edu>Marist College</a> | (845) 575-3000</p>
					<p>3399 North Road, Poughkeepsie, NY, 12601</p>
				</div>
			</div>
		</div>
	</body>
</html>