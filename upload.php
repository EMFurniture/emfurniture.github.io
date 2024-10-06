<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "<p>Please log in to upload a file.</p>";
    exit;
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the uploaded file
    $uploaded_file = $_FILES['uploaded_file'];

    // Check if a file was uploaded
    if (!empty($uploaded_file['name'])) {
        // Get the file's temporary name
        $temp_name = $uploaded_file['tmp_name'];

        // Get the file's original name
        $original_name = $uploaded_file['name'];

        // Define the upload directory
        $upload_dir = 'uploads/';

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($temp_name, $upload_dir . $original_name)) {
            echo "<p>File uploaded successfully!</p>";
        } else {
            echo "<p>Error uploading file.</p>";
        }
    } else {
        echo "<p>Please select a file to upload.</p>";
    }
}
?>