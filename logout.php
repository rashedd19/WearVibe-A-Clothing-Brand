<?php
// 1. Start the session to access session data
session_start();

// 2. Clear all session variables
session_unset();

// 3. Destroy the session completely
session_destroy();

// 4. Redirect the user to the home page after logout
header("Location: index.php");
exit;
?>