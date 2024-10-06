<?php
   session_start();

   // Check if the user is logged in and is an admin
   if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin') {
       // Load the JSON data
       $json_data = file_get_contents('index.json');
       $files = json_decode($json_data, true);

       // Display the list of uploaded files
       echo "<h2>Uploaded Files</h2>";
       echo "<ul>";
       foreach ($files as $file) {
           echo "<li>";
           echo "<a href='download.php?filename=" . urlencode($file['file_name']) . "'>" . $file['file_name'] . "</a>";
           echo " <a href='delete.php?filename=" . urlencode($file['file_name']) . "'>Delete</a>";
           echo "</li>";
       }
       echo "</ul>";

       // ... (Add code for file download and deletion) ...
   } else {
       echo "You are not authorized to access this page.";
   }
   ?>