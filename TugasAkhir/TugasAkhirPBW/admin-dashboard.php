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

    if($r['role'] != 'admin'){
        header("location:beranda-user.php");
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
    <title>Dashboard Admin User</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="asset/css/admin-style.css">
    <link rel="stylesheet" href="asset/css/scroller-style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="asset/image/logo-admin.svg" alt="">
                        </span>
                    </a>
                </li>

                <li>
                    <a href="admin-dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="admin-users.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Users</span>
                    </a>
                </li>

                <li>
                    <a href="admin-competitions.php">
                        <span class="icon">
                            <ion-icon name="trophy-outline"></ion-icon>
                        </span>
                        <span class="title">Competitions</span>
                    </a>
                </li>

                <li>
                    <a href="admin-seminar.php">
                        <span class="icon">
                            <ion-icon name="globe-outline"></ion-icon>
                        </span>
                        <span class="title">Seminar</span>
                    </a>
                </li>

                <li>
                    <a href="admin-news.php">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">News</span>
                    </a>
                </li>

                <li>
                    <a href="admin-feedback.php">
                        <span class="icon">
                            <ion-icon name="mail-open-outline"></ion-icon>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>
                <li>
                    <a href="asset/php/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="text">
                <h1>Welcome, <?php echo $r["full_name"]; ?></h1>
                <p>As an admin, you have access to powerful tools and features to manage and monitor your dashboard. This
                    admin panel allows you to control various aspects of the dashboard, including user management and manage
                    competition lists, seminar list, and news lists.</p>
            </div>
        </div>
    </div>
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script str="asset/js/admin.js"></script>
</body>

</html>