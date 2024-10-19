<?php 
session_start();

session_unset();

session_destroy();

echo "<script>alert('You have been logout successfully!');</script>";

header("Refresh: 2; URL=admin-login.php");

exit;
?>