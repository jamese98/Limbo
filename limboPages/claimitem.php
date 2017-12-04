<!-- claimitem.php
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
		   			<h1>Claim Item</h1>
		   			<?php
		   			# Display information for specified item
		   			if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
						$fname = $_POST['fname'];
						$lname = $_POST['lname'];
						$status = check_status($dbc, $id);
					
						if ($status == 'lost'){
							claim_item($dbc, $id, $fname, $lname, 1);
						}else if($status == 'found'){
							claim_item($dbc, $id, $fname, $lname, 0);
						}

						update_status($dbc, $id, 'claimed');
						echo '<div id="content_area"><h2>Item Updated</h2></div>';
					}
		   			#Close database connection
		   			mysqli_close($dbc);
		   			?>
				  	<br/><br/>
					<div id="entryform">
		   				<h1> Claim Items </h1>
						<p>Claim items found on the limbo site</p>
						<p>* = Required Field</p>
		   				<form action="viewitem.php" method="POST">
		   					<br>*First Name:<br>
					  		<input id="text" name="fname" value="<?php if(isset($_GET['fname'])) echo $_GET['fname'];?>">
					  		<br>*Last Name:<br>
					  		<input id="text" name="lname" value="<?php if(isset($_GET['lname'])) echo $_GET['lname'];?>">
					  		<br>Contact Number:<br>
					  		<input id="text" name="CB_NUM" value="<?php if(isset($_GET['CB_NUM'])) echo $_GET['CB_NUM'];?>">
					  		<br><br>
							<input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
			   				<input id="button" name="claim" type="Submit" value="Claim">
			   			</form> 
	   				</div>
	  			</div>
	  		</div>
	  		<!-- footer -->
			<div id="footer"></div>
	  	</div>
  	</body>
</html>