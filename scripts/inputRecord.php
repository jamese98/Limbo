<!-- inputRecord.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php
// Includes the dbc, all functions required and the redirect script 
require('connect_db.php');
require('limboFunctions.php');
require('redirect.php');

// Takes a input of status and determines wether a lost record or found record is inputed
function record_ctrl($status){
	// declares a global for the whole file for dbc
	global $dbc;
	// checks wether the status of an item was set to lost
	if ($status == "lost"){
			// Calls the appropriate function to insert a new item record
			insert_lost_record($dbc, $status);
	// checks wether the status of an item was set to found
	}else if ($status == "found"){
			// Calls the appropriate function to insert a new item record
			insert_found_record($dbc, $status);
	}
}

function insert_lost_record($dbc, $status){
	// Gets all values from the form
	$loc = $_GET['location'];
	$itemName = $_GET['name'];
	$descrp = $_GET['descrp'];
	//Sets the date to today at the current time
	$date = date("Y/m/d H:i:s");
	$room = $_GET['room'];
	$owner_fname = $_GET['owner_fname'];
	$owner_lname = $_GET['owner_lname'];

	// Checks wether the name of an item was ever submited
	if (empty($itemName)){ 
		echo '<div id="content_area"><h2>Please Enter an item name.</h2></div>';
	// checks if the fname was inputed and if not alerts the user
	}else if (empty($owner_fname)) {
		echo '<div id="content_area"><h2>Please Enter a owner First Name.</h2></div>';
	// checks if the lname was inputed and if not alerts the user
	}else if (empty($owner_lname)) {
		echo '<div id="content_area"><h2>Please Enter a owner Last Name.</h2></div>';
	}else{
		// Creates a query to input a record into the database
		$sql = "INSERT INTO stuff (location_id, name, description, create_date, room, owner_fname, owner_lname, status) VALUES('" . $loc . "','". $itemName. "','" . $descrp . "', '" . $date . "', '" . $room ."', '" . $owner_fname ."', '" . $owner_lname . "','" . $status . "')";

		//runs the query and places the results in a var 
		$result = mysqli_query( $dbc , $sql );
		// checks the result var for any errors
		check_results($result);
		// calls the redirect script to change the page
		redirect('lostitems.php');
		// Alerts the user that the submission was a sucess
		alert($result);
	}
	
}

function insert_found_record($dbc, $status){
	// Gets all values from the form
	$loc = $_GET['location'];
	$itemName = $_GET['name'];
	$descrp = $_GET['descrp'];
	//Sets the date to today at the current time
	$date = date("Y/m/d");
	$room = $_GET['room'];
	$finder_fname = $_GET['finder_fname'];
	$finder_lname = $_GET['finder_lname'];
	// Checks wether the name of an item was ever submited
	if (empty($itemName)){ 
		echo '<div id="content_area"><h2>Please Enter an item name.</h2></div>';
	// checks if the fname was inputed and if not alerts the user
	}else if (empty($finder_fname)) {
		echo '<div id="content_area"><h2>Please Enter a finder First Name.</h2></div>';
	// checks if the lname was inputed and if not alerts the user
	}else if (empty($finder_lname)) {
		echo '<div id="content_area"><h2>Please Enter a finder Last Name.</h2></div>';
	}else{
		// Creates a query to input a record into the database
		$sql = "INSERT INTO stuff (location_id, name, description, create_date, room, finder_fname, finder_lname, status) VALUES('" . $loc . "','". $itemName. "','" . $descrp . "', '" . $date . "', '" . $room ."', '" . $finder_fname ."', '" . $finder_lname . "','" . $status . "')";
			
		//runs the query and places the results in a var 
		$result = mysqli_query( $dbc , $sql );
		// checks the result var for any errors
		check_results($result);
		// calls the redirect script to change the page
		redirect('founditems.php');
		// Alerts the user that the submission was a sucess
		alert($result);
	}
}

# Inserts new admin record into the database
function insert_admin_record($dbc) {
	// Gets all values from the form
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	// Checks if the username field is filled out
	if(empty($username)) {
		echo '<div id="content_area"><h2>Please enter a username</h2></div>';
	//Checks if the password field was filled out 
	} else if(empty($password1)) {
		echo '<div id="content_area"><h2>Please Enter an password</h2></div>';
	//Checks if the confirm password field was filled out
	} else if(empty($password2)) {
		echo '<div id="content_area"><h2>Please confirm password</h2></div>';
	// Makes sure the 2 passwords match
	} else if($password1 != $password2) {
		echo '<div id="content_area"><h2>Passwords do not match. Please try again.</h2></div>';
	// If everything checks out a new admin is inserted in the users table
	} else {
		$query = "INSERT INTO users(first_name, pass, reg_date) VALUES('" . $username . "','" . $password1 . "', NOW())";
		//runs the query and places the results in a var 
		$result = mysqli_query($dbc, $query);
		// checks the result var for any errors
		check_results($result);
	}
}

// Is available to notify the user of a valid or invalid entry
function alert($result){
	// If the result is false there was an error so report that it failed
	if (!$result){
			echo '<div id="content_area"><h2>Please submit a valid record!</h2></div>';
		// Else the query ran
		}else{
			echo '<div id="content_area"><h2>Record Saved in Database</h2></div>';
	}
}

?>