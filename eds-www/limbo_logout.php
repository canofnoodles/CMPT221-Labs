<?php
// First we execute our common code to connection to the database and start the session
session_start();
require( 'includes/limbo_login_tools.php' );
     
// We remove the user's data from the session 
unset($_SESSION['user']); 
     
// We redirect them to the login page 
load("limbo_login.php");
?>