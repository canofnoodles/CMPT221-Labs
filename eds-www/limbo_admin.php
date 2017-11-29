<!DOCTYPE html>
<html>
<?php session_start();
# Author: Jonathan Smith, Paul Ippolito, David Cyganowski
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Connect to MySQL server and the database
require( 'includes/limbo_login_tools.php' ) ;

if (empty($_SESSION['user']))
{
    load('limbo_login.php');
}
?>
<!-- Get inputs from the user. -->
<h1>Limbo Admin Tools</h1>
    <p><a href="limbo.php">Home</a>  <a href="limbo_lost.php">Lost Items</a>  <a href="limbo_found.php">Found Items</a>  <a href="limbo_login.php">Admin's Page</a></p>
    <p align = "right"><a href="limbo_logout.php">Log out</a></p>
<p><a href="limbo_admin_inventory.php">Manage Limbo Inventory</a></p>
<p><a href="limbo_admin_account.php">Modify My Account</a></p>
</html>