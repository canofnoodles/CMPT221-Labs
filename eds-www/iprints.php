<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>iprints.php</title>
    <link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    <link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="/library/js/headscripts.js"></script>
    <style>body { padding: 5px !important; }</style>
  </head>
  <body>
<!--
This PHP script was modified based on result.php in McGrath (2012).
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
By Ron Coleman
-->
<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	$name = $_POST['name'] ;

    $price = $_POST['price'] ;

    if(!empty($name) && !empty($price)) {
      $result = insert_record($dbc, $name, $price) ;

      #echo "<p>Added " . $result . " new print(s) ". $name . " @ $" . $price . " .</p>" ;
    }
    else
      echo '<p style="color:red">Please input a name and a price!</p>' ;
}

# Show the records
show_records($dbc);

# Close the connection
mysqli_close( $dbc ) ;
?>

<!-- Get inputs from the user. -->
<form action="iprints.php" method="POST">
<table>
<tr>
<td>Name:</td><td><input type="text" name="name"></td>
</tr>
<tr>
<td>Price:</td><td><input type="text" name="price"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>
  </body>
</html>
