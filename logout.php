<?php
session_start();
session_unset();
session_destroy();
error_log("User logged out. Session cleared.");
header("Location: login.php");
exit();
?>