<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Style-Type" content="text/css" /> 
		<title>vipresidents.php</title>
		<link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
		<link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
		<script type="text/javascript" src="/library/js/headscripts.js"></script>
		<style>body { padding: 5px !important; }</style>
	</head>
	<body>
        <h1>Welcome to Limbo!</h1>
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

		if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST')
		{
			$num = $_POST['num'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$errors = array();
	
			if(!valid_number($num))
				$errors[] = '<p style="color:red;font-size:16px;"> Please give a valid number!</p>';
			if (!valid_name ($fname))
				$errors[] = '<p style="color:red;font-size:16px;"> Please give a valid first name!</p>';
			if (!valid_name($lname))
        			$errors[] = '<p style="color:red;font-size:16px;"> Please give a valid last name!</p>';
			if(empty($errors))
				insert_record($dbc, $num, $fname, $lname);
			else
				foreach($errors as $msg)
					echo $msg;
		}
		else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET')
		{
			if(isset($_GET['num']))
				show_record($dbc, $_GET['num']) ;
		}
		
		# Show the records
		show_link_records($dbc);
		# Close the connection
		mysqli_close( $dbc ) ;
		?>
		
		<!-- Get inputs from the user. -->
		<form action="linkypresidents.php" method="POST">
			<table>
				<tr>
					<td>Number:</td><td><input type="text" name="num" value="<?php if (isset($_POST['num'])) echo $_POST['num']; ?>"></td>
				</tr>
				<tr>
					<td>First Name:</td><td><input type="text" name="fname" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"></td>
				</tr>
				<tr>
					<td>Last Name:</td><td><input type="text" name="lname" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>"></td>
				</tr>
			</table>
			<p><input type="submit" ></p>
		</form>
	</body>
</html>
