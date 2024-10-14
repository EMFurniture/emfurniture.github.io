<?php
session_start();
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER['HTTP_USER_AGENT']);
}

if (isMobile()) {
    header("Location: /mobile/");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['username'])) {
        echo "<p>Please log in to submit the form.</p>";
        exit;
    }

    $name = $_POST['name'];
    $message = $_POST['message'];

    $db_conn = new mysqli('localhost','root','','em_furniture');
    if ($db_conn->connect_error) {
        die("Connection failed: " . $db_conn->connect_error);
    }

    $sql = "INSERT INTO messages (name, message) VALUES ('$name', '$message')";
    if ($db_conn->query($sql) === TRUE) {
        echo "<p>Data saved successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $db_conn->error . "</p>";
    }
    $db_conn->close();

    $json_data = file_get_contents('index.json'); 

    if (!empty($_FILES['uploaded_file']['name'])) {
        $uploaded_file = $_FILES['uploaded_file'];
        $file_content = file_get_contents($uploaded_file['tmp_name']);
        $encoded_content = base64_encode($file_content);

        $json_data = json_decode($json_data, true);
        $json_data[] = [
            'file_name' => $uploaded_file['name'],
            'file_content' => $encoded_content,
            'url' => '', 
            'url_content' => '' 
        ];
        $json_data = json_encode($json_data); 
    }
}

?>