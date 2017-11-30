<?php
$debug = true;

# Shows link records
function show_link_records($dbc, $table) {
	# Create database query for specified table
	if($table == "found") {
		$query = "SELECT id, name, status, create_date, update_date, location_id FROM stuff WHERE status = 'found' ORDER BY create_date DESC";
	} else if($table == "lost") {
		$query = "SELECT id, name, status, create_date, update_date, location_id FROM stuff WHERE status = 'lost' ORDER BY create_date DESC";
	} else if($table == "admin") {
		$query = "SELECT id, name, status, create_date, update_date, location_id, room FROM stuff ORDER BY create_date DESC";
	}
	
	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);

	# Show results
	if($results)
	{
  		# Generate a table row for each row result
  		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  			if($table == "found" || $table == "lost") {
  				# Tables for lost and found pages - user view
  				$alink = '<A HREF=viewitem.php?id=' . $row['id']  . '>' . $row['name'] . '</A>';
	    		echo '<TR>';
	    		echo '<TD>' . $alink . '</TD>';
	        	echo '<TD>' . ucwords($row['status']) . '</TD>';
	        	echo '<TD>' . date('m/d/Y', strtotime($row['create_date'])) . '</TD>';
	        	echo '<TD>' . date('H:i', strtotime($row['create_date'])) . '</TD>';
	        	echo '<TD>' . buildingToName($row['location_id']) . '</TD>';
	    		echo '</TR>';

  			} else if($table == "admin") {
  				# Table for admin page
 				$alink = '<A HREF=viewitem.php?id=' . $row['id']  . '>' . $row['id'] . '</A>';
	    		echo '<TR>';
	    		echo "<form action='admin.php' method='POST' name='delete".$row['id']."'>";
	    		echo '<td><input type=\'image\' src=\'../limboPages/delete.png\' class=\'delico\' name=\'deleteID\' value=' . $row['id'] . '></td>';
	    		echo "</form>";
	    		# Start the form for the dropdown menu - each menu is its own form
				echo "<form action='admin.php' method='POST' name='form".$row['id']."'>";
				# Hidden input to pass the item ID over POST for updating
	    		echo '<td><input type=\'hidden\' name=\'updateID\' value=' . $row['id'] . '>' . $alink . '</td>';
	    		echo '<TD>' . $row['name'];
	    		if($row['status'] == "lost") {
	    			# Generate dropdown options for items with lost status
					echo "<TD><select name='status' value='" . $row['status'] . "' onchange='this.form.submit()'>";
					echo "<option value='lost' selected>Lost</option>";
					echo "<option value='found'>Found</option>";
					echo "<option value='claimed'>Claimed</option>";
	    		} else if($row['status'] == "found") {
	    			# Generate dropdown options for items with found status
					echo "<TD><select name='status' value='" . $row['status'] . "' onchange='this.form.submit()'>";
					echo "<option value='lost'>Lost</option>";
					echo "<option value='found' selected>Found</option>";
					echo "<option value='claimed'>Claimed</option>";
	    		} else if($row['status'] == "claimed") {
	    			# Generate dropdown options for items with claimed status
					echo "<TD><select name='status' value='" . $row['status'] . "' onchange='this.form.submit()'>";
					echo "<option value='lost'>Lost</option>";
					echo "<option value='found'>Found</option>";
					echo "<option value='claimed' selected>Claimed</option>";	  			
	    		}
	    		# End the dropdown menu and form for row
	    		echo '</select>';
	    		echo '</form>';
	    		echo '</TD>';
	        	echo '<TD>' . date('m/d/Y', strtotime($row['create_date'])) . '</TD>';
				echo '<TD>' . date('m/d/Y', strtotime($row['update_date'])) . '</TD>';
	        	echo '<TD>' . buildingToName($row['location_id']) . ' ' . $row['room'] . '</TD>';
	    		echo '</TR>';
  			} 

  		}

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

?>