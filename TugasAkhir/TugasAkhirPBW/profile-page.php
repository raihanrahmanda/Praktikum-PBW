<?php 
    session_start();
    require "asset/php/db-config.php";
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }

    $username = $_SESSION['session_username'];
    $sql = "select * from users where username = '$username'";
    $q   = mysqli_query($conn,$sql);
    $r   = mysqli_fetch_array($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <link rel="stylesheet" href="asset/css/header-login-style.css">
    <link rel="stylesheet" href="asset/css/profile-page-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>Profile Page</title>
</head>
<body>
    <?php
        include 'asset/php/header-login.php';
    ?>

    <div class="container">
        <div class="box">
            <img src="asset/image/user/<?php echo $r["image"]; ?>" title="<?php echo $r['image']; ?>">
            <p><?php echo $r["full_name"]; ?></p>
            <p><?php echo $r["nim"]; ?></p>
            <div class="update-btn">
                <a href="edit-profile-form.php" class="hover-update">Edit Profile</a>
            </div>
            <div class="signout-btn">
                <a href="asset/php/logout.php" class="hover-signout">Sign-out</a>
            </div>
        </div>
        <div class="About">
            <h1>Profile</h1>

            <h2>Full Name</h2>
            <p><?php echo $r["full_name"]; ?></p>

            <h2>NIM</h2>
            <p><?php echo $r["nim"]; ?></p>

            <h2>Email</h2>
            <p><?php echo $r["email"]; ?></p>

            <h2>Telephone Number</h2>
            <p><?php echo $r["telno"]; ?></p>
            
            <h2>Skills</h2>
            <p><?php echo $r["skills"]; ?></p>
        </div>
    </div>
</body>
</html>