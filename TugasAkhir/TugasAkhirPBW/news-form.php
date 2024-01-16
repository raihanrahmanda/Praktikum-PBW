<?php
    session_start();
    require "asset/php/db-config.php";
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }
    
    // check if role is admin
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="asset/css/news-form-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <title>News Form Page</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title">
                <h1>News Form</h1>
                <p>please fill the form with <span>credible</span> informations</p>
            </div>
            <form action="asset/php/news-create.php"  method="post" enctype="multipart/form-data">
                <div class="form-content">
                    <div class="field">
                        <input type="text" name="title" required>
                        <label>Title</label>
                    </div>
                    <div class="field">
                        <textarea spellcheck="false" name="description" required></textarea>
                        <label>Description</label>
                    </div>
                    <div class="date">
                        <div class="field">
                            <input type="date" class="date" name="date" required>
                            <label>Date</label>
                        </div>
                    </div>
                    <div class="upload-poster">
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="submit-btn">
                        <input type="submit" name="input" value="Input">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="asset/js/news-form.js"></script>
</body>
</html>