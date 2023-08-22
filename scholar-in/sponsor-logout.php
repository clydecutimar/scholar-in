<?php
// Start or resume the session
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired location
header("Location: sponsor-login.php");
exit;
?>
