<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Style-Type" content="text/css" /> 
		<title>linkylost.php</title>
		<link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
		<link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
		<script type="text/javascript" src="/library/js/headscripts.js"></script>
		<style>body { padding: 5px !important; }</style>
	</head>
	<body>
        <h1>Lost Items</h1>
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
			$location_id = $_POST['location_id'];
			$descript = $_POST['descript'];
			//$status = $_POST['status'];
			$errors = array();
			
			if (!valid_name ($descript))
				$errors[] = '<p style="color:red;font-size:16px;"> Please give a valid description!</p>';
			
			if(empty($errors))
				insert_lost_record($dbc, $location_id, $descript);
			else
				foreach($errors as $msg)
					echo $msg;
		}
		else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET')
		{
			if(isset($_GET['id']))
				show_record($dbc, $_GET['id']) ;
		}
		
		# Show the records
		show_lost_link_records($dbc);
		# Close the connection
		mysqli_close( $dbc ) ;
		?>
		
		<!-- Get inputs from the user. -->
		<form action="limbo_lost.php" method="POST">
			<table>
				<tr>
                    <?php
                    $query = 'SELECT * FROM locations ORDER BY name';
                    require( 'includes/connect_db.php' );
                    $results = mysqli_query( $dbc , $query );
                    echo '<select name="location_id">';
                    while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
                    {
                        $str = '';
                        if(isset($_POST['location_id']))
                            if($_POST['location_id'] == $row['id'])
                                $str = 'selected = "selected"';
                        echo '<option ' . $str . ' value=' . $row['id'] . '>' . $row['name'] . '</option>';
                    }
                    echo '</select>';
                    ?>
				</tr>
				<tr>
					<td>Description:</td><td><input type="text" name="descript" value="<?php if (isset($_POST['descript'])) echo $_POST['descript']; ?>"></td>
				</tr>
			</table>
			<p><input type="submit" ></p>
		</form>
	</body>
</html>