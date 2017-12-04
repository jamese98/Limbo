<!-- viewitem.php
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<html>
<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);
# Connect to MySQL server/database
require('../scripts/connect_db.php');
# Include helper functions
require('../scripts/limboFunctions.php');
require('../scripts/showRecord.php');
require('../scripts/redirect.php');

# Display information for specified item

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
						if($_SERVER['REQUEST_METHOD'] == 'GET') {
							if(isset($_GET['id'])) {
								$id = $_GET['id'];
								// Output the information for items
								show_record($dbc, $id);
							
							}
						}
						?>
		   		
		   				<h1> Claim Items </h1>
						<p>Claim items found on the limbo site</p>
						<p>* = Required Field</p>
						<?php


						// If the claim button is pressed
						if(isset($_POST['claim'])){
							// get all values from the form
							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							$id = $_POST['id'];
							$CB_NUM = $_POST['CB_NUM'];
							// run a query to find the status
							$status = check_status($dbc, $id);
							if ($status == 'lost'){
								// Submit claimed info into the record
								claim_item($dbc, $id, $fname, $lname, $CB_NUM, 0);
								$page = 'lostitems.php';
					
							}else if($status == 'found'){
								// Submit claimed info into the record
								claim_item($dbc, $id, $fname, $lname, $CB_NUM, 1);
								$page = 'founditems.php';
							}
							// Change status to cliamed
							update_status($dbc, $id, 'claimed');
							// Set page to the current page with the value of the last id
							
							// relaod the page
							redirect($page);
							// alert the users
							echo "Item Updated";
						}
						#Close database connection
						mysqli_close($dbc);
						?>
		   				<form action="viewitem.php" method="POST">
		   					<br>*First Name:<br>
					  		<input id="text" name="fname" value="<?php if(isset($_GET['fname'])) echo $_GET['fname'];?>" required>
					  		<br>*Last Name:<br>
					  		<input id="text" name="lname" value="<?php if(isset($_GET['lname'])) echo $_GET['lname'];?>" required>
					  		<br>Contact Number:<br>
					  		<input id="text" name="CB_NUM" value="<?php if(isset($_GET['CB_NUM'])) echo $_GET['CB_NUM'];?>">
					  		<br><br>
							<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			   				<input id="button" name="claim" type="Submit" value="Claim">
			   			</form> 
	  			</div>
	  		</div>
	  		<!-- footer -->
			<div id="footer"></div>
	  	</div>
  	</body>
</html>