<!-- inputRecord.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php
require('connect_db.php');
require('limboFunctions.php');
require('../scripts/redirect.php');

function record_ctrl($status){
	global $dbc;
	if ($status == "lost"){
			insert_lost_record($dbc, $status);
	}else if ($status == "found"){
			insert_found_record($dbc, $status);
	}
}

function insert_lost_record($dbc, $status){
	$loc = $_GET['location'];
	$itemName = $_GET['name'];
	$descrp = $_GET['descrp'];
	$date = date("Y/m/d");
	$room = $_GET['room'];
	$owner_fname = $_GET['owner_fname'];
	$owner_lname = $_GET['owner_lname'];

	if (empty($itemName)){ 
		echo '<div id="content_area"><h2>Please Enter an item name.</h2></div>';
	
	}else if (empty($owner_fname)) {
		echo '<div id="content_area"><h2>Please Enter a owner First Name.</h2></div>';
	}else if (empty($owner_lname)) {
		echo '<div id="content_area"><h2>Please Enter a owner Last Name.</h2></div>';
	}else{
		$sql = "INSERT INTO stuff (location_id, name, description, create_date, room, owner_fname, owner_lname, status) VALUES('" . $loc . "','". $itemName. "','" . $descrp . "', '" . $date . "', '" . $room ."', '" . $owner_fname ."', '" . $owner_lname . "','" . $status . "')";
			
		$result = mysqli_query( $dbc , $sql );
		check_results($result);
		redirect('lostitems.php');
		alert($result);
	}
	
}

function insert_found_record($dbc, $status){
	$loc = $_GET['location'];
	$itemName = $_GET['name'];
	$descrp = $_GET['descrp'];
	$date = date("Y/m/d");
	$room = $_GET['room'];
	$finder_fname = $_GET['finder_fname'];
	$finder_lname = $_GET['finder_lname'];

	if (empty($itemName)){ 
		echo '<div id="content_area"><h2>Please Enter an item name.</h2></div>';
	
	}else if (empty($finder_fname)) {
		echo '<div id="content_area"><h2>Please Enter a finder First Name.</h2></div>';
	}else if (empty($finder_lname)) {
		echo '<div id="content_area"><h2>Please Enter a finder Last Name.</h2></div>';
	}else{
		$sql = "INSERT INTO stuff (location_id, name, description, create_date, room, finder_fname, finder_lname, status) VALUES('" . $loc . "','". $itemName. "','" . $descrp . "', '" . $date . "', '" . $room ."', '" . $finder_fname ."', '" . $finder_lname . "','" . $status . "')";
			
		$result = mysqli_query( $dbc , $sql );
		check_results($result);
		redirect('founditems.php');
		alert($result);
	}
}

function alert($result){
	if (!$result){
			echo '<div id="content_area"><h2>Please submit a valid record!</h2></div>';
		}else{
			echo '<div id="content_area"><h2>Record Saved in Database</h2></div>';
	}
}

?>