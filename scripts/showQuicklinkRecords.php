<?php
$debug = true;


# Shows link records
function show_quicklink_records($dbc, $table) {
	# Create database query for specified table
	if($table == "found") {
		$query = "SELECT id, name, status, create_date, location_id FROM stuff WHERE status = 'found' ORDER BY create_date DESC LIMIT 5";
	} else if($table == "lost") {
		$query = "SELECT id, name, status, create_date, location_id FROM stuff WHERE status = 'lost' ORDER BY create_date DESC LIMIT 5";
	}
	
	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);

	# Show results
	if($results)
	{
  		# For each row result, generate a table row
  		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  			$alink = '<A HREF=viewitem.php?id=' . $row['id']  . '>' . $row['name'] . '</A>';
    		echo '<TR>';
    		echo '<TD>' . $alink . '</TD>';
        	echo '<TD>' . ucwords($row['status']) . '</TD>';
        	echo '<TD>' . date('m/d/Y', strtotime($row['create_date'])) . '</TD>';
        	echo '<TD>' . buildingToName($row['location_id']) . '</TD>';
    		echo '</TR>';	
  		}

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

?>