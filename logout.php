<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to the index.php (not logged in)
header('Location: index.php');
exit;
?>