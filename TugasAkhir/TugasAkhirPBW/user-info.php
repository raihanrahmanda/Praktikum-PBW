<?php
    session_start();
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
    <link rel="stylesheet" href="asset/css/user-info-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>Competition List</title>
</head>
<body>
    <?php
        include 'asset/php/header-login.php';
    ?>

    

    <div class="title">
        <div class="text">
            <h1>CatchAW Army</h1>
        </div>
        <div class="toggle-search">
            <div class="ssearch">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                </div>
                <div class="input">
                    <input type="text" placeholder="Type keyword here" id="mysearch" onkeyup="searchSoldiers()">
                </div>
                    <span class="clear" onclick="clearSearch()"></span>
            </div>
        </div>
    </div>

    <div class="content">
        <table>
            <tr>
                <th>No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Skills</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            $rows = mysqli_query($conn, "SELECT * FROM users where role ='user' ORDER BY id DESC")
            ?>
            <?php foreach ($rows as $row) : ?>
            <tr>
                <td id="center-part"><?php echo $i++; ?></td>
                <td id="center-part"><img src="asset/image/user/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>"></td>
                <td><?php echo $row["full_name"]; ?></td>
                <td><?php echo $row["skills"]; ?></td>
                <td id="center-part">
                    <div class="icon">
                    <a href="user-profile-page.php?id=<?php echo $row['id']; ?>" class="detail-btn">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script src="asset/js/user-info.js"></script>
    
</body>
</html>