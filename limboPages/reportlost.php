<!-- lost.html
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->
<!DOCTYPE HTML>
<html>
<!-- <?php
# Connect to MySQL server/database
require('../scripts/connect_db.php');

# Include helper functions
require('../scripts/limboFunctions.php');

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	$num = $_POST['num'] ;
	$fname = $_POST['fname'] ;
	$lname = $_POST['lname'];
?> -->
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css">
		<title>Limbo - Report Lost</title>
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
						 	<li class="dropdown active-page"><a href="#" class="dropbtn">Report an Item</a>
						  	<div class="dropdown-content">
						  		<a href="reportlost.php" class="active-page">Lost</a>
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
		   		<div id="entryform">
		   			<h1> Lost Page </h1>
					<p>Submit records of lost items within the marist campus.</p>
					<form action="Limbo.php">
						<br>Item:<br>
					  	<input id="text" name="item" value="<?php if(isset($_POST['item'])) echo $_POST['item']; ?>">
					  	<br>Status:<br>
					  	<input id="text" name="status" value="<?php if(isset($_POST['status'])) echo $_POST['status']; ?>">
						<br>First name:<br>
					  	<input id="text" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
					  	<br>Last name:<br>
					  	<input id="text" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
					  	<br>Location:<br>
					  	<input id="text" name="location" value="<?php if(isset($_POST['location'])) echo $_POST['location']; ?>">
					  	<br>Date:<br>
					  	<input id="text" name="date" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>">
					  	<br>Email:<br>
					  	<input id="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
					  	<br>Phone Number:<br>
					  	<input id="text" name="phonenumber" value="<?php if(isset($_POST['phonenumber'])) echo $_POST['phonenumber']; ?>">
					  	<br>Additional Details:<br>
					  	<input id="text" name="details" value="<?php if(isset($_POST['details'])) echo $_POST['details']; ?>">
					  	<br><br>
					  	<input id="button" type="submit" value="Submit">
			  		</form> 
	   			 </div>
   			 	<!-- footer -->
	  			<div id="footer"></div>
  			<!-- end container -->
   			 </div>
		</div>
	</body>
</html>

