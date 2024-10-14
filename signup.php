<?php
     require_once 'db.php'; 

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $username = trim($_POST['username']);
         $password = trim($_POST['password']);

         // Validate input (add more validation as needed)
         if (empty($username) || empty($password)) {
             echo "Please enter both username and password.";
             exit;
         }

         // Hash the password
         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

         $conn = connectToDatabase();
         $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
         $stmt->bind_param("ss", $username, $hashedPassword);
         $stmt->execute();
         $stmt->close();
         $conn->close();

         echo "User registered successfully!";
     }
     ?>