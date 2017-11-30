<!-- reportfound.php
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require('../scripts/inputRecord.php');

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	$status = $_GET['status'];
	record_ctrl($status);
}
?>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css">
		<title>Limbo - Report Found</title>
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
						 	<li class="dropdown active-page"><a href="#" class="dropbtn">Report an Item</a>
						  	<div class="dropdown-content">
						  		<a href="reportlost.php">Lost</a>
						  		<a href="reportfound.php" class="active-page">Found</a>
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
		   			<h1> Finder Page </h1>
					<p>Submit records of found items within the marist campus.</p>
					<p>* = Required Field</p>
					<form action="reportfound.php">
						<br>Location:<br>
					  	<select id="text" name="location" >
     						<option value="">Select Building</option>
						    <option value="--Any--">--Any--</option>
					     	<option value="1">Allied Health Science Building</option>
				     		<option value="2">Byrne House</option>
				     		<option value="3">Cannavino Library </option>
				     		<option value="4">Champagnat Hall</option>
				     		<option value="5">Chapel</option>
				     		<option value="6">Cornell Boathouse </option>
				     		<option value="7"> Donnelly Hall</option>
				     		<option value="8">Dyson Center</option>
				     		<option value="9">Fern Tor</option>
				     		<option value="10">Fontaine Hall</option>
				     		<option value="11">Foy Townhouses</option>
				     		<option value="12">Greystone Hall</option>
				     		<option value="13">Hancock Center</option>
				     		<option value="14">Kieran Gatehouse</option>
				     		<option value="15">Kirk House</option>
				     		<option value="16">Lower Fulton Townhouses </option>
				     		<option value="17">Leo Hall</option>
				     		<option value="18">Longview Park </option>
				     		<option value="19">Lowell Thomas Communications Center</option>
				     		<option value="20">Lower New Townhouses</option>
				     		<option value="21">Lower West Townhouses</option>
				     		<option value="22">Marian Hall</option>
				     		<option value="23">Marist Boathouse</option>
				     		<option value="24">McCann Center</option>
				     		<option value="25">Mid-Rise Hall</option>
				     		<option value="26">New Gartland A</option>
				     		<option value="27">New Gartland B</option>
				     		<option value="28">New Gartland C</option>
				     		<option value="29">New Gartland D</option>
				     		<option value="30">St. Ann's Hermitage</option>
				     		<option value="31">St. Peter's</option>
				     		<option value="32">Sheahan Hall</option>
				     		<option value="33">Steel Plant Studios</option>
				     		<option value="34">Student Center</option>
				     		<option value="35">Upper Fulton Townhouses</option>
				     		<option value="36">Upper West Townhouses </option>
  						</select>
					  	<br>*Item Name:<br>
					  	<input id="text" name="name" value="<?php if(isset($_GET['name'])) echo $_GET['name'];?>">
						<br>Description:<br>
					  	<input id="text" name="descrp" value="<?php if(isset($_GET['descrp'])) echo $_GET['descrp'];?>">
					  	<br>Room Number:<br>
					  	<input id="text" name="room" value="<?php if(isset($_GET['room'])) echo $_GET['room'];?>">
					  	<br>*Finder First Name:<br>
					  	<input id="text" name="finder_fname" value="<?php if(isset($_GET['finder_fname'])) echo $_GET['finder_fname'];?>">
					  	<br>*Finder Last Name:<br>
					  	<input id="text" name="finder_lname" value="<?php if(isset($_GET['finder_lname'])) echo $_GET['finder_lname'];?>">
					  	<br><br>
					  	<input type="hidden" name="status" value="found">
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



					


