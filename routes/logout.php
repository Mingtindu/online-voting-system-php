<?php
session_start(); // Start the session

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to a login page or any other page
header("Location: ../index.html");
exit();
?>
