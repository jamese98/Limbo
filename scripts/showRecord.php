<?php
$debug = true;


function show_record($dbc, $id) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, name, status, location_id, create_date, description, finder, owner FROM stuff WHERE id = ' . $id;

	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);

	# Generate item information
	if($results){
		if($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
			if($row['status'] == 'found') {
		  		echo '<p>Name: ' . $row['name'] . '</p>';
		  		echo '<p>Status: ' . ucwords($row['status']) . '</p>';
		  		echo '<p>Location Found: ' . buildingToName($row['location_id']) . '</p>';
		  		echo '<p>Date/Time Found: ' . $row['create_date'] . '</p>';
		  		echo '<p>Description: ' . $row['description'] . '</p>';
		  		echo '<p>Finder Name: ' . $row['finder_fname'] . '</p>';
		  		echo '<p>Finder Name: ' . $row['finder_lname'] . '</p>';				
			} else if($row['status'] == 'lost')	{
		  		echo '<p>Name: ' . $row['name'] . '</p>';
		  		echo '<p>Status: ' . ucwords($row['status']) . '</p>';
		  		echo '<p>Location Lost: ' . buildingToName($row['location_id']) . '</p>';
		  		echo '<p>Date/Time Lost: ' . $row['create_date'];
		  		echo '<p>Description: ' . $row['description'];
		  		echo '<p>Owner First Name: ' . $row['owner_fname'] . '</p>';	
		  		echo '<p>Owner Last Name: ' . $row['owner_lname'] . '</p>';
			} else if($row['status'] == 'claimed') {
		  		echo '<p>Name: ' . $row['name'] . '</p>';
		  		echo '<p>Status: ' . ucwords($row['status']) . '</p>';
		  		echo '<p>Location Found: ' . buildingToName($row['location_id']) . '</p>';
		  		echo '<p>Date/Time Found: ' . $row['create_date'];
		  		echo '<p>Description: ' . $row['description'];
		  		echo '<p>Owner First Name: ' . $row['owner_fname'] . '</p>';	
		  		echo '<p>Owner Last Name: ' . $row['owner_lname'] . '</p>';
		  		echo '<p>Finder Name: ' . $row['finder_fname'] . '</p>';
		  		echo '<p>Finder Name: ' . $row['finder_lname'] . '</p>';
			}
		}

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

?>