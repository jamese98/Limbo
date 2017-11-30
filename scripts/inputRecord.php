<!-- inputRecord.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php
require('connect_db.php');
require('limboFunctions.php');

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

	$sql = "INSERT INTO stuff (location_id, name, description, create_date, room, owner_fname, owner_lname, status) VALUES('" . $loc . "','". $itemName. "','" . $descrp . "', '" . $date . "', '" . $room ."', '" . $owner_fname ."', '" . $owner_lname . "','" . $status . "')";
		
	$result = mysqli_query( $dbc , $sql );
	check_results($result);
	alert($result);
}

function insert_found_record($dbc, $status){
	$loc = $_GET['location'];
	$itemName = $_GET['name'];
	$descrp = $_GET['descrp'];
	$date = date("Y/m/d");
	$room = $_GET['room'];
	$finder_fname = $_GET['finder_fname'];
	$finder_lname = $_GET['finder_lname'];

	$sql = "INSERT INTO stuff (location_id, name, description, create_date, room, finder_fname, finder_lname, status) VALUES('" . $loc . "','". $itemName. "','" . $descrp . "', '" . $date . "', '" . $room ."', '" . $finder_fname ."', '" . $finder_lname . "','" . $status . "')";
		
	$result = mysqli_query( $dbc , $sql );
	check_results($result);
	alert($result);
}

function alert($result){
	if (!$result){
			echo '<h4 id="err">Please submit a valid record!</h4>';
		}else{
			echo '<h4 id="err">Record Saved in Database</h4>';
	}
}

?>