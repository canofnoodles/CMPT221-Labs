<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Style-Type" content="text/css" /> 
		<title>Item Info</title>
		<link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
		<link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
		<script type="text/javascript" src="/library/js/headscripts.js"></script>
		<style>body { padding: 5px !important; }</style>
	</head>
	<body>
        <h1>LIMBO</h1>
    <p><a href="limbo.php">Home</a>  <a href="limbo_lost.php">Lost Items</a>  <a href="limbo_found.php">Found Items</a>  <a href="limbo_login.php">Admin's Page</a></p>
<!--
Author: Jonathan Smith, Paul Ippolito, David Cyganowski
This PHP script was modified based on stickypresidents.php
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
-->
		
		<?php
		# Connect to MySQL server and the database
		require( 'includes/connect_db.php' );
		# Includes these helper functions
		require( 'includes/helpers.php' );
		if ($_SERVER[ 'REQUEST_METHOD' ] == 'GET')
		{
            $id = $_GET['id'];
			show_record($dbc, $id);
		}
		# Close the connection
		mysqli_close( $dbc ) ;
		?>
	</body>
</html>