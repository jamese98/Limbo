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
	$loc = $_POST['location'];
	$descrp = $_POST['description'];
	$room = $_POST['room'];
	$owner = $_POST['owner'];

	$sql = "INSERT INTO stuff (location_id, description, create_date, room, owner, finder, status) VALUES('" . $loc . "', '" .$descrp . "', 'NOW();', '" . $room ."', '". $owner. "', '" . $finder ."', '" . $status. "')";
		
	$result = mysqli_query( $dbc , $sql );
	check_results($result);
	alert($result);
}

function insert_found_record($dbc, $status){
	$loc = $_POST['location'];
	$descrp = $_POST['description'];
	$date = $_POST['date'];
	$room = $_POST['room'];
	$finder = $_POST['finder'];

	$sql = "INSERT INTO stuff (location_id, description, create_date, room, owner, finder, status) VALUES('" . $loc . "', '" .$descrp . "', '" . $date ."', '" . $room ."', '". $owner. "', '" . $finder ."', '" . $status. "')";
		
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