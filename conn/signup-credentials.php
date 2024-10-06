<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your actual password
$dbname = "em_furniture"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>