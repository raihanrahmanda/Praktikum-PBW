<?php
    session_start();
    require "db-config.php";

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

    $NewsId = $_GET["id"];

    if (isset($_POST["update-news"])) {
        $title = $_POST["title"];
        $desc = $_POST["description"];
        $date = $_POST["date"];

        if ($_FILES["image"]["error"] == 4) {
            echo "<script>alert('Image does not exist');</script>";
        } else {
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));

            if (!in_array($imageExtension, $validImageExtension)) {
                echo "<script>alert('Invalid image extension');</script>";
            } else if ($fileSize > 1000000) {
                echo "<script>alert('Image size is too large');</script>";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                $destination = '../image/news/' . $newImageName;
                $title = mysqli_real_escape_string($conn, $title);
                $desc = mysqli_real_escape_string($conn, $desc);
                $date = mysqli_real_escape_string($conn, $date);
                $newImageName = mysqli_real_escape_string($conn, $newImageName);

                // Replace new lines with HTML line breaks
                $desc = nl2br($desc);
                if (move_uploaded_file($tmpName, $destination)) {
                    $query = "UPDATE news SET 
                        `title` = '$title',
                        `description` = '$desc',
                        `date` = '$date'
                        WHERE `id` = '$NewsId'";

                    if (mysqli_query($conn, $query)) {
                        echo "<script>
                            alert('Successfully updated');
                            window.location.href = '../../admin-news.php';
                        </script>";
                    } else {
                        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "');</script>";
                    }
                } else {
                    echo "<script>alert('Failed to move uploaded file');</script>";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="../css/header-not-login-style.css">
    <link rel="stylesheet" href="../css/news-form-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../image/logo-title-final.svg" type="image/icon type">
    <title>News Form Page</title>
</head>
<body>
    <?php
        $query = "SELECT * FROM news WHERE id = '$NewsId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container">
        <div class="wrapper">
            <div class="title">
                <h1>News Form</h1>
                <p>please fill the form with <span>credible</span> informations</p>
            </div>
            <form action=""  method="post" enctype="multipart/form-data">
                <div class="form-content">
                    <div class="field">
                        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
                        <label>Title</label>
                    </div>
                    <div class="field">
                        <textarea spellcheck="false" name="description" value="<?php echo $row['description']; ?>" required></textarea>
                        <label>Description</label>
                    </div>
                    <div class="date">
                        <div class="field">
                            <input type="date" class="date" name="date" value="<?php echo $row['date']; ?>" required>
                            <label>Date</label>
                        </div>
                    </div>
                    <div class="upload-poster">
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="submit-btn">
                        <input type="submit" name="update-news" value="Input">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/news-form.js"></script>
</body>
</html>