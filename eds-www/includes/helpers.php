<?php
$debug = true;

# Shows the records in prints
function show_records($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT name, price FROM prints ORDER BY price ASC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Prints</H1>' ;
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>Name</TH>';
  		echo '<TH>Price</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['name'] . '</TD>' ;
    		echo '<TD>' . $row['price'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Inserts a record into the prints table
function insert_record($dbc, $name, $price) {
  $query = 'INSERT INTO prints(name, price) VALUES ("' . $name . '" , ' . $price . ' )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}
?>