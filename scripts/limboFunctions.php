<!-- limboFunctions.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);
require('connect_db.php');

// check if a query produces an error
function check_results($results) {
  // declare dbc globally for all functions to use
  global $dbc;

  // Check if the results are flase and if so output the error
  if($results != true){
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
  }
  return true ;
}

# Updates the status of an item in the database; used by the admin page
function update_status($dbc, $id, $status) {
  # Create and execute query to update status of item with specified id
  $query = "UPDATE stuff SET status = '" . $status . "' WHERE id = $id";
  mysqli_query($dbc, $query);
}

#Changes the value of a records status to claimed
function claim_item($dbc, $id, $fname, $lname, $CB_NUM, $statID) {
  # if the record is claimed and found insert the finders information
  if(empty($CB_NUM)){
    $CB_NUM = 'Null';
  }

  if ($statID == 0){
   $query = "UPDATE stuff SET finder_fname = '" . $fname . "', finder_lname ='" . $lname . "', claim_contact = '". $CB_NUM ."'WHERE id ='" . $id . "'";
   # if the record is claimed and lost insert the owners information
  }else if ($statID == 1){
   $query = "UPDATE stuff SET owner_fname = '" . $fname . "', owner_lname ='" . $lname . "' , claim_contact = '". $CB_NUM . "'WHERE id ='" . $id . "'";
  }
  #run the query and set the output to the result var
  $result = mysqli_query( $dbc , $query );
  #check wether the query ran into any errors
  check_results($result);
  #if everything worked alert the user that the item gas been updated
  echo "Item Updated";

}          


# Checks the status of a record using the id
function check_status($dbc, $id) {
  # return the results of the status for an id
  $query = 'SELECT status FROM stuff WHERE id = ' . $id;
  #run the query and set the output to the result var
  console_log($query);
  $result = mysqli_query($dbc, $query);
   #check wether the query ran into any errors
  check_results($result);
  #return the result of the query
  return $result;
}


# Deletes an item from the database; used by the admin page
function delete_item($dbc, $id) {
  # Create and execute query to delete item with specified id
  $query = "DELETE FROM stuff WHERE id = $id";
  mysqli_query($dbc, $query);
}

#CHecks wether the user name for admin login is valid
function validateName($input){

  #queries the DB where the username exists
	$query = "SELECT first_name FROM users WHERE first_name='" . $input . "'";

	# Execute the query
  	$results = mysqli_query($dbc, $query);
  	check_results($results);

    #checks wether at least one record is found and if not returns false
  	if (mysqli_num_rows( $results ) == 0 ){
    	return false;
  	} else {
      return true;
 	}

}


function validatePass($input){
	global $dbc;


	#Retrieve password from DB and compare input to the actual value
	$query = "SELECT pass FROM users WHERE first_name='" . $userName . "'" ;


	#Take the pw passed to the function and hash it 
	$pw = hash('ripemd160',$input);

	#Retrieve password from DB and compare input to the actual value
	$query = "SELECT pass FROM users WHERE pass='" . $pw . "'" ;

	# Execute the query
  	$results = mysqli_query( $dbc, $query ) ;
 	check_results($results);

  #checks wether at least one record is found and if not returns false
 	if (mysqli_num_rows( $results ) == 0 ){
    	return false ;
  	}else{
  		return true;
  	}
}

function buildingToName($id){
  global $dbc;
  // gets the name of the location with coresponding id
  $query = "SELECT name FROM locations WHERE id = " .$id. "";

  #checks results
  $results = mysqli_query($dbc, $query);
  check_results($results);
  $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
  return $row['name'];
}
// A function used for debugging
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

# Updates admin information
function update_admin($dbc, $id, $username, $password) {
  # Create and execute query to update status of item with specified id
  //$query = 'SELECT * FROM stuff WHERE id = ' . $id;
  $query = 'UPDATE users SET first_name = ' . $username . ', pass = ' . $password . ' WHERE id = ' . $id;
  console_log($query);
  mysqli_query($dbc, $query);
}

?>