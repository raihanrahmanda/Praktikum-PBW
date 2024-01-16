<?php 
    session_start();
    require "asset/php/db-config.php";

    $UsersId = $_GET["id"];
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <link rel="stylesheet" href="asset/css/header-login-style.css">
    <link rel="stylesheet" href="asset/css/user-profile-page-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>Profile Page</title>
</head>
<body>
    <?php
        include 'asset/php/header-login.php';
        $query = "SELECT * FROM users WHERE id = '$UsersId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container">
        <div class="box">
            <img src="asset/image/user/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
            <p><?php echo $row['full_name']; ?></p>
            <p><?php echo $row['nim']; ?></p>
            <div class="container-icon">
                <a href="https://wa.me/<?php echo $row['telno']; ?>">
                    <i class="fa-brands fa-whatsapp fa-xl"></i>
                </a>
                <a href="mailto:<?php echo $row['email']; ?>">
                    <i class="fa-solid fa-envelope fa-xl"></i>
                </a>
            </div>
        </div>
        <div class="box2">
            <div class="About">
                <h1>Competition History</h1>
        
                <div class="box-main">
                <?php
                    $rows1 = mysqli_query($conn, "SELECT * FROM competitions_history where id_user = $UsersId ORDER BY date DESC");
                ?>
                <?php foreach ($rows1 as $row1) : ?>
                    <div class="box-table">
                        <div class="table-left">
                            <p><?php echo $row1["date"]; ?></p>
                        </div>
                        <div class="table-mid">
                            <h3 class="custom-h3"><?php echo $row1["name"]; ?></h3>
                            <p class="custom-margin"><?php echo $row1["organizer"]; ?></p>
                            <p class="custom-margin"><?php echo $row1["ranking"]; ?></p>
                            <p class="custom-margin"><?php echo $row1["description"]; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
                
            </div>
            <div class="history">
                <h1>Skills</h1>
    
                <p><?php echo $row['skills']; ?></p>              
            </div>
        </div>
    </div>
</body>
</html>