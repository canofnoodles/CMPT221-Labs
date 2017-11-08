<!DOCTYPE html>
<html>
<?php
# Author: Jonathan Smith, Paul Ippolito, David Cyganowski
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Connect to MySQL server and the database
require( 'includes/presidents_login_tools.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

	$name = $_POST['lname'] ;

    $pid = validate($name) ;

    if($pid == -1)
      echo '<P style=color:red>Login failed please try again.</P>' ;

    else
      load('linkypresidents.php', $pid);
}
?>
<!-- Get inputs from the user. -->
<h1>The Presidents Login Page</h1>
<form action="presidents_login.php" method="POST">
<table>
<tr>
<td>Name:</td><td><input type="text" name="lname"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>