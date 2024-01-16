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

    if ($r['role'] != 'user') {
        header("location:admin-dashboard.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <link rel="stylesheet" href="asset/css/beranda-user-style.css">
    <link rel="stylesheet" href="asset/css/header-login-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>CatchAW Website Layout</title>
</head>

<body>
    <?php
        include 'asset/php/header-login.php';
    ?>


    <div class="boxes">
        <div class="box1">
            <h2>Resume</h2>
            <?php
                if($r["image"] == NULL){
                    echo "<img src='asset/image/user.png' alt='user' class='user-image'>";
                }else{
                    echo "<img src='asset/image/user/".$r["image"]."' alt='user' class='user-image'>";
                }
            ?>
            <h3>Name</h3>
            <p><?php echo $r["full_name"]; ?></p>
            <h3>Skills</h3>
            <p><?php echo $r["skills"]; ?></p>
        </div>
        <div class="box2">
            <div class="box2-title">
                <h2>News</h2>
                <div class="icon">
                    <a href="news-info.php">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
            <button class="pre-btn"><img src="asset/image/arrow.png" alt=""></button>
            <button class="next-btn"><img src="asset/image/arrow.png" alt=""></button>
            <div class="news-container">
                <?php
                    $rows = mysqli_query($conn, "SELECT * FROM news ORDER BY id DESC")
                ?>
                <?php foreach ($rows as $row) : ?>
                <div class="news-card">
                    <div class="news-image">
                        <img src="asset/image/news/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
                    </div>
                    <div class="news-info">
                        <p><?php echo $row["description"]; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="box3">
            <div class="box3-title">
                <h2>Recommendations</h2>
                <div class="icon">
                    <a href="user-info.php">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
            <?php
                    $rows = mysqli_query($conn, "SELECT * FROM users where role = 'user' AND username != '$username' ORDER BY id DESC limit 3")
                ?>
            <?php foreach ($rows as $row) : ?>
            <div class="user">
                <img src="asset/image/user/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
                <p><?php echo $row["full_name"]; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="box4">
            <div class="box4-title">
                <div class="text">
                    <h2>Competition Info</h2>
                </div>
                <div class="icon">
                    <a href="competition-info.php">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
            <div class="media-scroller snaps-inline">
                <?php
                    $rows = mysqli_query($conn, "SELECT * FROM competitions ORDER BY id DESC")
                ?>
                <?php foreach ($rows as $row) : ?>
                <div class="media-element">
                    <img src="asset/image/lomba/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
                    <p class="title"><?php echo $row["name"]; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="box5">
            <div class="box5-title">
                <h2>Seminar Info</h2>
                <div class="icon">
                    <a href="seminar-info.php">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
            <div class="media-scroller snaps-inline">
                <?php
                    $rows = mysqli_query($conn, "SELECT * FROM seminar ORDER BY id DESC")
                ?>
                <?php foreach ($rows as $row) : ?>
                <div class="media-element">
                    <img src="asset/image/seminar/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
                    <p class="title"><?php echo $row["name"]; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="asset/js/beranda-user.js"></script>
</body>

</html>