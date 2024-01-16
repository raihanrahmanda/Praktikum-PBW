<?php
    session_start();
    require "asset/php/db-config.php";

 if (isset($_POST['reset'])) {
    // check email account
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        header('location: change-pw.php?email='.$email.'');
    } else {
        echo "
        <script>
            alert('Email not found');   
            header('location: forget-pw.php');
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
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="field">
                <input type="submit" name="reset" value="Reset Password">
            </div>

            <div class="back-link">
                <a href="login.php">Back</a>
            </div>
        </form>
    </div>
</body>

</html>