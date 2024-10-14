<?php
     session_start();
     require_once 'db.php'; 

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $username = trim($_POST['username']);
         $password = trim($_POST['password']);

         // Validate input (add more validation as needed)
         if (empty($username) || empty($password)) {
             echo json_encode(array('success' => false, 'message' => 'Please enter both username and password.'));
             exit;
         }

         $user = getUserByUsername($username); // Use the function from db.php

         if ($user) {
             if (password_verify($password, $user['password'])) {
                 $_SESSION['username'] = $username;
                 echo json_encode(array('success' => true, 'message' => 'Login successful'));
                 exit;
             } else {
                 echo json_encode(array('success' => false, 'message' => 'Incorrect password.'));
                 exit;
             }
         } else {
             echo json_encode(array('success' => false, 'message' => 'Invalid username.'));
             exit;
         }
     }
     ?>