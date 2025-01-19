<?php
// Start the session
session_start();

// Display all session variables and information
echo '<pre>';
print_r($_SESSION); // This will print all session variables
echo '</pre>';

// Optionally, display session ID and other session information
echo 'Session ID: ' . session_id() . '<br>';
echo 'Session Name: ' . session_name() . '<br>';
?>
