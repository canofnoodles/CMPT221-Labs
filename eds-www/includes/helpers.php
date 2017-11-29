<?php
$debug = true;
# Author: Jonathan Smith, Paul Ippolito, David Cyganowski
# Shows the records in the presidents table
function show_records($dbc)
{
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, location_id, descript, status FROM stuff' ;
	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Lost Stuff</H1>';
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
		echo '<TH>Location</TH>';
  		echo '<TH>Description</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
			echo '<TR>' ;
			echo '<TD>' . $row['id'] . '</TD>' ;
			echo '<TD>' . $row['location_id'] . '</TD>' ;
			echo '<TD>' . $row['descript'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}
  		# End the table
  		echo '</TABLE>';
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}
function show_link_records($dbc)
{
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, location_id, descript, status FROM stuff WHERE status = "lost"' ;
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Lost Stuff</H1>';
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>Location ID</TH>';
		echo '<TH>Description</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
			echo '<TR>';
			$alink = '<A HREF=limbo_lost.php?num=' . $row['id']  . '>' . $row['id'] . '</A>';
			echo '<TD>' . $alink . '</TD>';
			echo '<TD>' . $row['location_id'] . '</TD>';
			echo '<TD>' . $row['descript'] . '</TD>';
			echo '<TD>' . $row['status'] . '</TD>';
			echo '</TR>';
  		}
  		# End the table
  		echo '</TABLE>';
  		# Free up the results in memory
  		mysqli_free_result( $results );
	}
}
function show_lost_link_records($dbc)
{
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, location_id, descript, status FROM stuff WHERE status = "lost"' ;
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Lost Stuff</H1>';
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Description</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';
        
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
			echo '<TR>';
			$alink = '<A HREF=limbo_lost.php?num=' . $row['id']  . '>' . $row['id'] . '</A>';
			echo '<TD>' . $alink . '</TD>';
            $query = 'SELECT name FROM locations WHERE id = ' . $row['location_id'];
            $resultloc = mysqli_query( $dbc , $query );
            $rowloc = mysqli_fetch_array( $resultloc , MYSQLI_ASSOC );
			echo '<TD>' . $rowloc['name'] . '</TD>';
			echo '<TD>' . $row['descript'] . '</TD>';
			echo '<TD>' . $row['status'] . '</TD>';
			echo '</TR>';
  		}
  		# End the table
  		echo '</TABLE>';
  		# Free up the results in memory
  		mysqli_free_result( $results );
	}
}
function show_found_link_records($dbc)
{
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, location_id, descript, status FROM stuff WHERE status = "found"' ;
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Found Stuff</H1>';
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Description</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';
        
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
			echo '<TR>';
			$alink = '<A HREF=limbo_lost.php?num=' . $row['id']  . '>' . $row['id'] . '</A>';
			echo '<TD>' . $alink . '</TD>';
            $query = 'SELECT name FROM locations WHERE id = ' . $row['location_id'];
            $resultloc = mysqli_query( $dbc , $query );
            $rowloc = mysqli_fetch_array( $resultloc , MYSQLI_ASSOC );
			echo '<TD>' . $rowloc['name'] . '</TD>';
			echo '<TD>' . $row['descript'] . '</TD>';
			echo '<TD>' . $row['status'] . '</TD>';
			echo '</TR>';
  		}
  		# End the table
  		echo '</TABLE>';
  		# Free up the results in memory
  		mysqli_free_result( $results );
	}
}
function show_record($dbc, $num)
{
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, location_id, descript, status FROM stuff';
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Lost Stuff</H1>';
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
		echo '<TH>Location ID</TH>';
  		echo '<TH>Description</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
			echo '<TR>' ;
			echo '<TD>' . $row['num'] . '</TD>' ;
			echo '<TD>' . $row['fname'] . '</TD>' ;
			echo '<TD>' . $row['lname'] . '</TD>' ;
			echo '<TD>' . $row['descript'] . '<TD>';
			
			echo '</TR>' ;
  		}
  		# End the table
  		echo '</TABLE>';
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}
function insert_lost_record($dbc, $location_id, $name)
{
	$query = 'INSERT INTO stuff(location_id, descript, create_date, update_date, status) VALUES ("' . $location_id . '", "' . $name . '", NOW(), NOW(), "lost")' ;
	show_query($query);
	$results = mysqli_query($dbc,$query);
	check_results($results) ;
	return $results ;
}
function insert_found_record($dbc, $location_id, $name)
{
	$query = 'INSERT INTO stuff(location_id, descript, create_date, update_date, status) VALUES ("' . $location_id . '", "' . $name . '", NOW(), NOW(), "found")' ;
	show_query($query);
	$results = mysqli_query($dbc,$query);
	check_results($results) ;
	return $results ;
}
# Shows the query as a debugging aid
function show_query($query)
{
	global $debug;
	if($debug)
		echo "<p>Query = $query</p>" ;
}
# Checks the query results as a debugging aid
function check_results($results)
{
	global $dbc;
	if($results != true) 
		echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}
# Validates a given name
function valid_name ($name)
{
	if(empty($name))
		return false;
	return true;
}
# Validates a given number
function valid_number ($num)
{
	if(empty($num) || !is_numeric($num))
		return false;
	else
	{
		$num = intval ($num);
		if($num <= 0)
			return false;
	}
	return true;
}
function valid_date ($fdate)
{
	if(empty($fdate))
		return false;
	return true;
}
?>