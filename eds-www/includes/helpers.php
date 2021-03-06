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
	$query = 'SELECT id, location_id, descript, status FROM stuff' ;
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
	$query = 'SELECT id, location_id, descript, status FROM stuff WHERE status = "lost" ORDER BY descript' ;
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Lost Stuff</H1>';
  		echo '<TABLE border=1>';
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
			$alink = '<a href="#" onClick="MyWindow=window.open(\'limbo_item_info.php?id=' . $row['id'] . '\',\'MyWindow\',width=600,height=300); return false;">' . $row['id'] . '</a>';
			echo '<TD>' . $alink . '</TD>';
            echo '<TD>' . locidToName($dbc, $row['location_id']) . '</TD>';
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
	$query = 'SELECT id, location_id, descript, status FROM stuff WHERE status = "found" ORDER BY descript' ;
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Found Stuff</H1>';
  		echo '<TABLE border=1>';
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
			$alink = '<a href="#" onClick="MyWindow=window.open(\'limbo_item_info.php?id=' . $row['id'] . '\',\'MyWindow\',width=600,height=300); return false;">' . $row['id'] . '</a>';
			echo '<TD>' . $alink . '</TD>';
			echo '<TD>' . locidToName($dbc, $row['location_id']) . '</TD>';
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
function show_record($dbc, $id)
{
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff WHERE id = ' . $id;
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
        $row = mysqli_fetch_array( $results , MYSQLI_ASSOC );
  		echo '<H1>' . $row['status'] . ' Item</H1>';
        echo '<h3>Description: </h3>' . $row['descript'];
        echo '<h3>Location: </h3>' . locidToName($dbc, $row['location_id']);
        echo '<h3>Last Updated: </h3>' . $row['update_date'];
        echo '<h3>Room: </h3>' . $row['room'];
        echo '<h3>Owner: </h3>' . $row['owner'];
        echo '<h3>Finder: </h3>' . $row['finder'];
        
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}
function show_admin_records($dbc)
{
    # Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff ORDER BY id' ;
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>All Items</H1>';
  		echo '<TABLE border=1>';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>Description</TH>';
		echo '<TH>Status</TH>';
		echo '<TH>Location</TH>';
        echo '<TH>Room</TH>';
        echo '<TH>Owner</TH>';
        echo '<TH>Finder</TH>';
        echo '<TH>Create Date</TH>';
        echo '<TH>Update Date</TH>';
        echo '<TH>DELETE</TH>';
  		echo '</TR>';
        
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
			echo '<TR>';
			$alink = '<a href="#" onClick="MyWindow=window.open(\'limbo_item_info.php?id=' . $row['id'] . '\',\'MyWindow\',width=600,height=300); return false;">' . $row['id'] . '</a>';
			echo '<TD>' . $alink . '</TD>';
            echo '<TD>' . $row['descript'] . '</TD>';
            switch($row['status'])
            {
                case "lost":
                    echo '<TD><select name="status' . $row['id'] . '"><option selected="selected" value="lost">lost</option><option value="found">found</option><option value="claimed">claimed</option></select>';
                    break;
                case "found":
                    echo '<TD><select name="status' . $row['id'] . '"><option value="lost">lost</option><option selected="selected" value="found">found</option><option value="claimed">claimed</option></select>';
                    break;
                case "claimed":
                    echo '<TD><select name="status' . $row['id'] . '"><option value="lost">lost</option><option value="found">found</option><option selected="selected" value="claimed">claimed</option></select>';
            }
			echo '<TD>' . locidToName($dbc, $row['location_id']) . '</TD>';
            echo '<TD>' . $row['room'] . '</TD>';
			echo '<TD>' . $row['owner'] . '</TD>';
            echo '<TD>' . $row['finder'] . '</TD>';
			echo '<TD>' . $row['create_date'] . '</TD>';
            echo '<TD>' . $row['update_date'] . '</TD>';
            echo '<TD><input type="checkbox" name="delete' . $row['id'] . '"></TD>';
			echo '</TR>';
  		}
  		# End the table
  		echo '</TABLE>';
  		# Free up the results in memory
  		mysqli_free_result( $results );
	}
}
function show_home_records($dbc)
{
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, location_id, descript, status FROM stuff ORDER BY descript';
	# Execute the query
	$results = mysqli_query( $dbc , $query );
	check_results($results);
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Limbo Stuff</H1>';
  		echo '<TABLE border=1>';
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
			$alink = '<a href="#" onClick="MyWindow=window.open(\'limbo_item_info.php?id=' . $row['id'] . '\',\'MyWindow\',width=600,height=300); return false;">' . $row['id'] . '</a>';
			echo '<TD>' . $alink . '</TD>';
			echo '<TD>' . locidToName($dbc, $row['location_id']) . '</TD>';
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
function locidToName($dbc, $id)
{
    $query = 'SELECT name FROM locations WHERE id = ' . $id;
    $resultloc = mysqli_query( $dbc , $query );
    $rowloc = mysqli_fetch_array( $resultloc , MYSQLI_ASSOC );
    $name = $rowloc['name'];
    return $name;
}
function insert_lost_record($dbc, $location_id, $name, $room, $owner)
{
	$query = 'INSERT INTO stuff(location_id, descript, create_date, update_date, status, room, owner) VALUES ("' . $location_id . '", "' . $name . '", NOW(), NOW(), "lost", "' . $room . '", "' . $owner . '")' ;
	show_query($query);
	$results = mysqli_query($dbc,$query);
	check_results($results) ;
	return $results ;
}
function insert_found_record($dbc, $location_id, $name, $room, $finder)
{
	$query = 'INSERT INTO stuff(location_id, descript, create_date, update_date, status, room, finder) VALUES ("' . $location_id . '", "' . $name . '", NOW(), NOW(), "found", "' . $room . '", "' . $finder . '")' ;
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
# Loads a specified or default URL.
function load( $page = 'limbo_admin.php')
{
    # Begin URL with protocol, domain, and current directory.
    $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;
    # Remove trailing slashes then append page name to URL and the print id.
    $url = rtrim( $url, '/\\' ) ;
    $url .= '/' . $page;

    # Execute redirect then quit.
    session_start();

    header( "Location: $url" ) ;

    exit() ;
}

# Validates the print name.
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validate($name = '', $pass = '')
{
    global $dbc;

    if(empty($name) || empty($pass))
        return -1 ;

    # Make the query
    $query = "SELECT username, pass FROM users WHERE username = '" . $name . "' AND pass = '" . $pass . "'";
    show_query($query) ;

    # Execute the query
    $results = mysqli_query( $dbc, $query ) ;
    check_results($results);

    # If we get no rows, the login failed
    if (mysqli_num_rows( $results ) == 0 )
        return -1;

    # We have at least one row, so get the frist one and return it
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

    $pid = $row [ 'user_id' ] ;

    return intval($pid) ;
}
?>