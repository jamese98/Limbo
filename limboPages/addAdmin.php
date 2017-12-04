<!-- addAdmin.php
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<?php
// ini_set('display_errors', TRUE);
// error_reporting(E_ALL);

//includes the input record script
require('../scripts/inputRecord.php');
?>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css">
		<title>Limbo - Add Admin</title>
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
		   		<div id="entryform">
		   			<h1> Create New Admin </h1>
					<p>Create new admin to manage Limbo database</p>
					<p>* = Required Field</p>
					<form action="manageAdmins.php" method="POST">
					  	<br>*Username:<br>
					  	<!-- Creates a sticky textbox for username and holds the username value -->
					  	<input id="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>">
						<br>*Password:<br>
						<!-- holds the password value untill submited -->
					  	<input id="text" type="password" name="password1">
					  	<br>*Confirm Password:<br>
					  	<input id="text" type="password" name="password2">
					  	<br><br>
					  	<!-- Submits the formn and re loads the page -->
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



					


