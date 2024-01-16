<?php
    session_start();
    require "asset/php/db-config.php";

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
    <link rel="stylesheet" href="asset/css/project-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <title>Project - CatchAW</title>
</head>
<body>
    <?php 
        include "asset/php/header-login.php";
        $query = "SELECT * FROM users WHERE username = '$_SESSION[session_username]'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    ?>

    <div class="boxes">
        <div class="competitions-box">
            <div class="box-header">
                <div class="box-title">
                    <h2>Competitions</h2>
                </div>
                <div class="box-icon">
                    <a href="#divOne">
                        <i class="fas fa-plus fa-lg"></i>
                    </a>
                </div>
                <div class="overlay1" id="divOne">
                    <div class="wrapper1">
                        <h2>Please Fill up The Form</h2><a class="close1" href="#">&times;</a>
                        <div class="content1">
                            <div class="container1">
                                <form action="asset/php/project-create.php" method="post">
                                    <label>Competition Name</label>
                                    <input placeholder="ex: STIS Festival 2023" name="name" type="text">
                                    <label>Organizer</label>
                                    <input placeholder="ex: UKM Bimbel STIS" name="organizer" type="text">
                                    <label>Date</label>
                                    <input placeholder="" name="date" type="date">
                                    <label>Ranking</label>
                                    <input placeholder="ex: Juara 1" name="ranking" type="text">
                                    <label>Description</label> 
                                    <textarea placeholder="ex: Saya berperan sebagai data scientist di lomba ini" name="description"></textarea>
                                    <input type="submit" name="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
	            </div>
            </div>
            <div class="box-main">
                <?php
                    $rows1 = mysqli_query($conn, "SELECT * FROM competitions_history where id_user = '$row[id]' ORDER BY date DESC");
                ?>
                <?php foreach ($rows1 as $row1) : ?>
                    <div class="box-table">
                        <div class="table-left">
                            <p><?php echo $row1["date"]; ?></p>
                        </div>
                        <div class="table-mid">
                            <h3><?php echo $row1["name"]; ?></h3>
                            <p><?php echo $row1["organizer"]; ?></p>
                            <p><?php echo $row1["ranking"]; ?></p>
                            <p><?php echo $row1["description"]; ?></p>
                        </div>
                        <div class="table-right">
                            <a href="asset/php/project-update.php?id=<?php echo $row1["id"]; ?>">
                                <i class="fa-solid fa-pen fa-sm"></i>
                            </a>
	                    </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="seminar-box">
            <div class="box-header">
                <div class="box-title">
                    <h2>Seminar</h2>
                </div>
                <div class="box-icon">
                    <a href="#divThree">
                        <i class="fas fa-plus fa-lg"></i>
                    </a>
                </div>
                <div class="overlay3" id="divThree">
                    <div class="wrapper3">
                        <h2>Please Fill up The Form</h2><a class="close3" href="#">&times;</a>
                        <div class="content3">
                            <div class="container3">
                                <form action="asset/php/project-seminar-create.php" method="post">
                                    <label>Seminar Name</label>
                                    <input placeholder="ex: Seminar Akademik" name="name" type="text">
                                    <label>Organizer</label>
                                    <input placeholder="ex: UKM Bimbel STIS" name="organizer" type="text">
                                    <label>Date</label>
                                    <input placeholder="" name="date" type="date">
                                    <label>Description</label> 
                                    <textarea placeholder="ex: Saya mengikuti seminar tentang statistik" name="description"></textarea>
                                    <input type="submit" name="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
	            </div>
            </div>
            <div class="box-main">
                <?php
                    $rows3 = mysqli_query($conn, "SELECT * FROM seminar_history where id_user = '$row[id]' ORDER BY date DESC");
                ?>
                <?php foreach ($rows3 as $row3) : ?>
                <div class="box-table">
                    <div class="table-left">
                        <p><?php echo $row3["date"]; ?></p>
                    </div>
                    <div class="table-mid">
                        <h3><?php echo $row3["name"]; ?></h3>
                        <p><?php echo $row3["organizer"]; ?></p>
                        <p><?php echo $row3["description"]; ?></p>
                    </div>
                    <div class="table-right">
                        <a href="asset/php/project-seminar-update.php?id=<?php echo $row3["id"]; ?>">
                            <i class="fa-solid fa-pen fa-sm"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>