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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="asset/css/competition-form-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <title>Seminar Form Page</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title">
                <h1>Seminar Form</h1>
                <p>please fill the form with <span>credible</span> informations</p>
            </div>
            <form action="asset/php/seminar-create.php" method="post" enctype="multipart/form-data">
                <div class="field">
                    <input type="text" name="name" required>
                    <label>Name</label>
                </div>
                <div class="field">
                    <input type="text" name="organizer" required>
                    <label>Organizer</label>
                </div>
                <div class="field">
                    <textarea spellcheck="false" name="description" required></textarea>
                    <label>Description</label>
                </div>
                <div class="date">
                    <div class="field">
                        <input type="date" class="date" name="start-date" required>
                        <label>Open Registration Date</label>
                    </div>
                    <div class="field">
                        <input type="date" class="date" name="end-date" required>
                        <label>Close Registration Date</label>
                    </div>
                </div>
                <div class="field">
                    <input type="number" name="registration-fee" required>
                    <label>Registration Fee</label>
                </div>
                <div class="field">
                    <input type="text" name="registration-link" required>
                    <label>Registration link</label>
                </div>
                <div class="field">
                    <input type="text" name="contact-person" required>
                    <label>Contact Person</label>
                </div>
                <div class="upload-poster">
                <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" required>
                </div>
                <div class="submit-btn">
                    <input type="submit" name="input" value="Input">
                </div>
            </form>
        </div>
    </div>

    
    <script src="asset/js/competition-form.js"></script>
</body>
</html>