
<!-- session_start();
session_destroy();
header("Location: login.php");
exit(); -->
<?php
session_start();
session_unset();           // Clear all session variables
session_destroy();         // Destroy session
header("Location: login.php?logout=1");  // Redirect to login with logout success message
exit();
?>
