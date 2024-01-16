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
    <link rel="stylesheet" href="asset/css/admin-feedback-style.css">
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
                <h1>CatchAW Feedback List</h1>
                <p>
                    This is the list of users feedback from CatchAW website.
                </p>
            </div>

            <div class="row-count">
            <?php
                $rowCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM feedback"));
                echo "Number of feedback: " . $rowCount;
            ?>
            </div>

            <div class="feedback-table">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    $rows = mysqli_query($conn, "SELECT * FROM feedback ORDER BY id DESC")
                    ?>

                    <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["message"]; ?></td>
                        <td>
                            <div class="action-icon">
                            <a href="asset/php/feedback-delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this data?')">
                                <ion-icon id="trash" name="trash-outline"></ion-icon>
                            </a>    
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            </div>
        </div>
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script str="asset/js/admin.js"></script>
</body>

</html>