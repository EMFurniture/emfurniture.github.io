<?php
// Include database credentials
require_once 'conn/signup-credentials.php';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input
    $username = trim($username);
    $password = trim($password);

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
        exit;
    }

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password using bcrypt
        if (password_verify($password, $row['password'])) {
            // Start a new session
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role']; // Add this line to set the role

            // Redirect to the desired page (e.g., index.php)
            header('Location: index.php');
            exit;
        } else {
            // Output JavaScript to display an alert
            echo "<script>alert('Incorrect password.');</script>";
            // Redirect to login.php after the alert
            header('Location: login.php'); 
            exit;
        }
    } else {
        echo "<script>alert('Invalid username.');</script>";
        header('Location: login.php');
        exit;
    }

    $conn->close();
}
?>