<?php 
session_start(); // Start the session before destroying it
session_destroy(); // Destroy the session
header("Location: index.php"); // Redirect to home page
exit; // Ensure no further execution
?>
