<?php
    session_start();
    require "asset/php/db-config.php";
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE username = '$_SESSION[session_username]'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if($row['role'] != 'admin'){
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
    <link rel="stylesheet" href="asset/css/scroller-style.css">
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <title>Dashboard Admin User</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="asset/css/admin-style.css">
    <link rel="stylesheet" href="asset/css/admin-users-style.css">
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
                <h1>CatchAW Users List</h1>
                <p>
                    This is the list of all users that have registered in CatchAW.
                </p>
            </div>

            <div class="row-count">
            <?php
                $rowCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users where role = 'user'"));
                echo "Number of users: " . $rowCount;
            ?>
            </div>

            <div class="users-table">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Profile Photo</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Telephone Number</th>
                        <th>Skills</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    $rows = mysqli_query($conn, "SELECT * FROM users where role = 'user' ORDER BY id DESC")
                    ?>

                    <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><img src="asset/image/user/<?php echo $row["image"]; ?>" width = 100 height=100 title="<?php echo $row['image']; ?>"></td>
                        <td><?php echo $row["full_name"]; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td><?php echo $row["nim"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["telno"]; ?></td>
                        <td><?php echo $row["skills"]; ?></td>
                        <td>
                            <div class="action-icon">
                            <a href="asset/php/user-update.php?id=<?php echo $row["id"]; ?>">
                                <ion-icon id="update" name="sync-outline"></ion-icon>
                            </a>
                            
                            <a href="asset/php/user-delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this data?')">
                                <ion-icon id="trash" name="trash-outline"></ion-icon>
                            </a>    
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
            <div class="input-btn">
                <a href="asset/php/user-create.php">
                    Input Data
                </a>
            </div>
        </div>
    </div>
        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script str="asset/js/admin.js"></script>
</body>

</html>