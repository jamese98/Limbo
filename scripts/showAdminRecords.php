<?php
$debug = true;

# Shows admin records
function show_admin_records($dbc) {
	# Create database query for specified table
	$query = "SELECT * FROM users";
	
	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);

	# Show results
	if($results){
  		# Generate a table row for each row result
  		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  				# Tables for lost and found pages - user view
  				$alink = '<A HREF=editadmin.php?id=' . $row['user_id']  . '>' . $row['user_id'] . '</A>';
  				echo '<TR>';
  				# Delete button
	    		echo "<form action='manageAdmins.php' method='POST' name='adminDelete".$row['user_id']."'>";
	    		echo '<td><input type=\'image\' src=\'../limboPages/delete.png\' class=\'delico\' name=\'deleteID\' value=' . $row['user_id'] . '></td>';
	    		echo "</form>";
	    		echo '<td>' . $alink . '</td>';
	        	echo '<TD>' . $row['first_name'] . '</TD>';
	        	echo '<TD>' . date('m/d/Y', strtotime($row['reg_date'])) . '</TD>';
	    		echo '</TR>';
  			} 

  		}
  		# Free up the results in memory
  		mysqli_free_result($results);
	}

?>