<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>FoundItems.php</title>
    <link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    <link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="/library/js/headscripts.js"></script>
    <style>body { padding: 5px !important; }</style>
  </head>
  <body>
      <h1>Found Items</h1>
    <p><a href="limbo.php">Home</a>  <a href="limbo_lost.php">Lost Items</a>  <a href="limbo_found.php">Found Items</a>  <a href="limbo_login.php">Admin's Page</a></p>
<!--
Author: Jonathan Smith, Paul Ippolito, David Cyganowski
-->
<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;
# Includes these helper functions
require( 'includes/helpers.php' ) ;
if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST')
{
	
	$location_id = $_POST['location_id'];
    $descript = $_POST['descript'];
    //$status = $_POST['status'];
    $errors = array();
			
    if (!valid_name ($descript))
        $errors[] = '<p style="color:red;font-size:16px;"> Please give a valid description!</p>';
			
    if(empty($errors))
        insert_found_record($dbc, $location_id, $descript);
    else
        foreach($errors as $msg)
            echo $msg;
}
# Show the records
show_found_link_records($dbc);
# Close the connection
mysqli_close( $dbc ) ;
?>

    <form action="limbo_found.php" method="POST">
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

</html>
</body>
</html>
