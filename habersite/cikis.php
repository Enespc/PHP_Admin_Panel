<?php
// Start session
session_start();

// Destroy session
session_destroy();

// Redirect to loginpage
header("Location: index.php");
exit;
?>