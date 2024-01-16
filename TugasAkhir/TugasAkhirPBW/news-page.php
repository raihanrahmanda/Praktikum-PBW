<?php
    session_start();
    require "asset/php/db-config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <link rel="stylesheet" href="asset/css/news-page-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>News Page</title>
</head>
<body>
    <?php
        if(!isset($_SESSION['session_username'])){
            echo "<link rel='stylesheet' href='asset/css/header-not-login-style.css'>";
            include 'asset/php/header-not-login.php';
        } else {
            echo "<link rel='stylesheet' href='asset/css/header-login-style.css'>";
            include 'asset/php/header-login.php';
        }
    ?>

    <?php

        $newsId = $_GET['id'];  // Assuming you pass the news ID through the URL parameter
        $query = "SELECT * FROM news WHERE id = $newsId"; // Modify the query based on your table structure
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

    ?>
    <div class="content">
        <h1><?php echo $row["title"]; ?></h1>
        <img src="asset/image/news/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
        <p>
        <?php echo $row["description"]; ?>
        </p>
        <div class="back-link">
            <a href="news-info.php"><< back to list</a>
        </div>
    </div>

</body>
</html>