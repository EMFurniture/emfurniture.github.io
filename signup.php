<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        echo json_encode(array('success' => false, 'message' => 'Please enter both username and password.'));
        exit;
    }

    // Check for existing user
    $existingUser = getUserByUsername($username);
    if ($existingUser) {
        echo json_encode(array('success' => false, 'message' => 'Username already exists.'));
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $conn = connectToDatabase();
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo json_encode(array('success' => true, 'message' => 'User registered successfully!'));
        // Redirect to login or welcome page
        // header('Location: login.php'); 
    } catch (mysqli_sql_exception $e) {
        echo json_encode(array('success' => false, 'message' => 'Error registering user: ' . $e->getMessage()));
    }
}
?>