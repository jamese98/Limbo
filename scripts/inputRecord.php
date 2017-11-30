<!-- inputRecord.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php
require('connect_db.php');
require('limboFunctions.php');

function record_ctrl($status){
	if ($status == "lost"){
			insert_lost_record($dbc, $status);
	}else if ($status == "found"){
			insert_lost_record($dbc, $status);
	}
}

function insert_lost_record($dbc, $status){
	$loc = $GET['location'];
	$descrp = $_GET['descrp'];
	$room = $_GET['room'];
	$owner = $_GET['owner'];

	$sql = "INSERT INTO stuff (location_id, description, create_date, room, owner, finder, status) VALUES('" . $loc . "', '" . $descrp . "', 'NOW();', '" . $room ."', '". $owner. "', '" . $finder ."', '" . $status. "')";
		
	$result = mysqli_query( $dbc , $sql );
	check_results($result);
	alert($result);
}

function insert_found_record($dbc, $status){
	$loc = $_GET['location'];
	$descrp = $_GET'descrp'];
	$date = $_GET['date'];
	$room = $_GET['room'];
	$finder = $_GET['finder'];

	$sql = "INSERT INTO stuff (location_id, description, create_date, room, owner, finder, status) VALUES('" . $loc . "', '" . $descrp . "', '" . $date ."', '" . $room ."', '". $owner. "', '" . $finder ."', '" . $status. "')";
		
	$result = mysqli_query( $dbc , $sql );
	check_results($result);
	alert($result);
}

function alert($result){
	if (!$result){
			echo "Please submit a valid record!";
		}else{
			echo "Record Saved in Database";
	}
}

?>