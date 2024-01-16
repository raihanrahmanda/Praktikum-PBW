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
    <link rel="stylesheet" href="asset/css/seminar-info-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>Seminar List</title>
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

    <div class="title">
        <div class="text">
            <h1>Seminar List</h1>
        </div>
        <div class="toggle-search">
            <div class="ssearch">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                </div>
                <div class="input">
                    <input type="text" placeholder="Type keyword here" id="mysearch" onkeyup="searchCompetitions()">
                </div>
                <span class="clear" onclick="clearSearch()"></span>
            </div>
        </div>
    </div>

    <div class="content">
    <?php
            $rows = mysqli_query($conn, "SELECT * FROM seminar ORDER BY id DESC")
        ?>
        <?php foreach ($rows as $row) : ?>
        <div class="competition-card">
            <div class="competition-image" onclick="togglePopup('popup-<?php echo $row["id"]; ?>')">
            <img src="asset/image/seminar/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
            </div>
            <div class="competition-title">
                <p><?php echo $row["name"]; ?></p>
            </div>
            <div class="popup" id="popup-<?php echo $row["id"]; ?>">
                <div class="overlay"></div>
                <div class="popup-content">
                    <div class="close-btn" onclick="togglePopup('popup-<?php echo $row["id"]; ?>')">&times;</div>
                    <div class="content-box">
                        <b>Name:</b> <br>
                        <?php echo $row["name"]; ?><br>
                        <br>
                        <b>Organizer:</b> <br>
                        <?php echo $row["organizer"]; ?> <br>
                        <br>
                        <b>Description:</b> <br>
                        <?php echo $row["description"]; ?><br>
                        <br>
                        <b>Registration Fee:</b> <br>
                        Rp<?php echo $row["reg_fee"]; ?>,-<br>
                        <br>
                        <b>Registration Link:</b> <br>
                        <a
                            href="<?php echo $row["reg_link"]; ?>"><?php echo $row["reg_link"]; ?></a><br>
                        <br>
                        <b>Contact Person:</b> <br>
                        <a href="https://instagram.com/<?php echo $row["cp"]; ?>"><?php echo $row["cp"]; ?></a><br>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script src="asset/js/seminar.js"></script>
    
</body>
</html>