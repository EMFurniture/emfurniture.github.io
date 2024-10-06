<?php
   session_start();

   // Database connection (replace with your actual credentials)
   $db_conn = new mysqli('localhost', 'root', '', 'em_furniture');

   // Handle login form submission
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $username = $_POST['username'];
       $password = $_POST['password'];

       // Validate input (sanitize and check for empty fields)
       $username = trim($username);
       $password = trim($password);

       if (empty($username) || empty($password)) {
           echo "Please enter both username and password.";
           exit;
       }

       // Query the database for the user
       $sql = "SELECT * FROM users WHERE username = '$username'";
       $result = $db_conn->query($sql);

       if ($result->num_rows > 0) {
           $row = $result->fetch_assoc();

           // Verify password (using bcrypt)
           if (password_verify($password, $row['password'])) {
               // Start a new session
               $_SESSION['username'] = $username;

               // Redirect to the original page (your form)
               header('Location: index.php'); 
               exit;
           } else {
               echo "Incorrect password.";
           }
       } else {
           echo "Invalid username.";
       }

       $db_conn->close();
   }
   ?>