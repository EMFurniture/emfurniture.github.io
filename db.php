<?php
     require_once 'config.php'; // Include your configuration file

     function connectToDatabase() {
         global $servername, $username, $password, $dbname; // Access the variables from config.php

         $conn = new mysqli($servername, $username, $password, $dbname);

         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }

         return $conn;
     }

     // Example function to fetch a user by username
     function getUserByUsername($username) {
         $conn = connectToDatabase();
         $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
         $stmt->bind_param("s", $username);
         $stmt->execute();
         $result = $stmt->get_result();
         $user = $result->fetch_assoc();
         $stmt->close();
         $conn->close();

         return $user;
     }

     // Add more functions as needed for other database operations
     ?>