<?php
$debug = true;


function show_admin($dbc, $id) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM users WHERE user_id = ' . $id;

	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);

	# Generate item information
	if($results){
		if($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			echo "<form action = 'editadmin.php' method='POST'>";
		  		echo "<a>Username: </a>";
		  		echo "<input type='text' name='username' value='" . $row['first_name'] . "'>";
		  		echo "<p>Registration Date: " . date('m/d/Y', strtotime($row['reg_date'])) .  "</p>";
		  		echo "<br/>";
		  		echo "<br/>";
		  		echo '<p>Change Password:</p>';
		  		echo "<a>Password: </a>";
		  		echo "<input type='hidden' name='updateID' value='" . $id . "'>";
		  		echo "<input type='password' name='password1' value='" . $row['pass'] . "'>";
		  		echo "<br/>";
		  		echo "<a>Confirm: </a>";
		  		echo "<input type='password' name='password2' value='" . $row['pass'] . "'>";
		  		echo "<br/><br/>";
		  		echo "<input id='button' type='Submit' value='Update'>";
		  	echo "</form>";
		}

  		# Free up the results in memory
  		mysqli_free_result($results);
	}
}

?>