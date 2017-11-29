<!DOCTYPE html>
<html>
<?php session_start();
# Author: Jonathan Smith, Paul Ippolito, David Cyganowski
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Connect to MySQL server and the database
require( 'includes/helpers.php' ) ;
    
if(empty($_SESSION['user']))
{

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

	$name = $_POST['username'] ;
    
    $pass = $_POST['pass'] ;

    $pid = validate($name, $pass) ;

    if($pid == -1)
      echo '<P style=color:red>Login failed please try again.</P>' ;

    else
    {
        $_SESSION['user'] = $name;
        load('limbo_admin.php');
    }
}
}
else
{
    load('limbo_admin.php');
}
?>
<!-- Get inputs from the user. -->
<h1>Limbo Admin Login Page</h1>
    <p><a href="limbo.php">Home</a>  <a href="limbo_lost.php">Lost Items</a>  <a href="limbo_found.php">Found Items</a>  <a href="limbo_login.php">Admin's Page</a></p>
<form action="limbo_login.php" method="POST">
<table>
<tr>
<td>Username:</td><td><input type="text" name="username"></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="pass"></td>
</tr>
</table>
<p><input type="submit"></p>
</form>
</html>