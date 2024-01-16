<?php
    session_start();
    require "asset/php/db-config.php";

    if (isset($_POST['change'])) {

        $newPassword = $_POST['new-password'];
        $confirmNewPassword = $_POST['confirm-new-password'];
        $email = $_GET['email'];

        if ($newPassword == $confirmNewPassword) {
            $query = "UPDATE users SET password='$newPassword' WHERE email='$email'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "
                <script>
                    alert('Password changed successfully');
                    window.location.href='login.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Password changed failed');
                    window.location.href='change-pw.php';
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Password not match');
                window.location.href='change-pw.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/forget-pw-style.css">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>CatchAW Forgot the Password Page</title>
</head>

<body>
    <div class="wrapper">
        <h1>Forgot Password?</h1>
        <p>Reset password in two quick way</p>
        <form action="" method="post">
            <div class="field">
                <input type="password" name="new-password" required>
                <label>New Password</label>
            </div>
            <div class="field">
                <input type="password" name="confirm-new-password" required>
                <label>Rewrite New Password</label>
            </div>
            <div class="field">
                <input type="submit" name="change" value="Reset Password">
            </div>

            <div class="back-link">
                <a href="forget-pw.php">Back</a>
            </div>
        </form>
    </div>
</body>

</html>