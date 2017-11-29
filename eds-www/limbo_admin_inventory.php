<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Style-Type" content="text/css" /> 
		<title>Admin Inventory</title>
		<link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
		<link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
		<script type="text/javascript" src="/library/js/headscripts.js"></script>
		<style>body { padding: 5px !important; }</style>
	</head>
	<body>
        <h1>Limbo Admin Tools</h1>
    <p><a href="limbo.php">Home</a>  <a href="limbo_lost.php">Lost Items</a>  <a href="limbo_found.php">Found Items</a>  <a href="limbo_login.php">Admin's Page</a></p>
    <p align = "right"><a href="limbo_logout.php">Log out</a></p>
<!--
Author: Jonathan Smith, Paul Ippolito, David Cyganowski
This PHP script was modified based on stickypresidents.php
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
-->
		
		<?php session_start();
		# Connect to MySQL server and the database
		require( 'includes/connect_db.php' );
		# Includes these helper functions
		require( 'includes/helpers.php' );
        
        if (empty($_SESSION['user']))
        {
            load('limbo_login.php');
        }
        
        if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST')
        {
            $query = "SELECT * FROM stuff";
            $results = mysqli_query( $dbc , $query );
            while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
            {
                if(isset($_POST['status' . $row['id']]))
                {
                    $status = $_POST['status' . $row['id']];
                    if($status != $row['status'])
                    {
                        $query = 'UPDATE stuff SET status = "' . $status . '" WHERE id = ' . $row['id'];
                        $result = mysqli_query($dbc, $query);
                        check_results($result);
                    }
                }
                if(isset($_POST['delete' . $row['id']]))
                {
                    $query = 'DELETE FROM stuff WHERE id = ' . $row['id'];
                    $result = mysqli_query($dbc, $query);
                    check_results($result);
                }
            }
        }
        
		?>
		
		<!-- Get inputs from the user. -->
        <form action="limbo_admin_inventory.php" method="POST">
            <?php show_admin_records($dbc); ?>
			<p><input type="submit" ></p>
		</form>
	</body>
</html>
