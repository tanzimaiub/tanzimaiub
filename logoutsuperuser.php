<?php
session_start(); // Start the session
session_destroy(); // Destroy all session data
header("Location: superuserlogin.php"); // Redirect to login page
exit();
?>
