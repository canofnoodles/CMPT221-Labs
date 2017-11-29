<?php
// First we execute our common code to connection to the database and start the session
session_start();
require( 'includes/helpers.php' );
     
// We remove the user's data from the session 
unset($_SESSION['user']); 
     
// We redirect them to the login page 
load("limbo_login.php");
?>