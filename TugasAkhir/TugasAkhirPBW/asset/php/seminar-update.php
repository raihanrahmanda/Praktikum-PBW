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

    $SeminarId = $_GET["id"];

    if (isset($_POST["update-seminar"])) {
        $name = $_POST["name"];
        $organizer = $_POST["organizer"];
        $desc = $_POST["description"];
        $open_date = $_POST["start-date"];
        $close_date = $_POST["end-date"];
        $reg_fee = $_POST["registration-fee"];
        $reg_link = $_POST["registration-link"];
        $cp = $_POST["contact-person"];

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

                $destination = '../image/seminar/' . $newImageName;
                if (move_uploaded_file($tmpName, $destination)) {
                    $query = "UPDATE seminar SET 
                        `name` = '$name',
                        `organizer` = '$organizer',
                        `description` = '$desc',
                        `start_date` = '$open_date',
                        `close_date` = '$close_date',
                        `reg_fee` = '$reg_fee',
                        `reg_link` = '$reg_link',
                        `cp` = '$cp',
                        `image` = '$newImageName'
                        WHERE `id` = '$SeminarId'";

                    if (mysqli_query($conn, $query)) {
                        echo "<script>
                            alert('Successfully updated');
                            window.location.href = '../../admin-seminar.php';
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
    <link rel="stylesheet" href="../css/competition-form-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="../image/logo-title-final.svg" type="image/icon type">
    <title>Seminar Form Page</title>
</head>
<body>
    <?php
        $query = "SELECT * FROM seminar WHERE id = '$SeminarId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <div class="wrapper">
            <div class="title">
                <h1>Seminar Form</h1>
                <p>please fill the form with <span>credible</span> informations</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field">
                    <input type="text" name="name" value="<?php echo $row['name']; ?>"  required>
                    <label>Name</label>
                </div>
                <div class="field">
                    <input type="text" name="organizer" value="<?php echo $row['organizer']; ?>" required>
                    <label>Organizer</label>
                </div>
                <div class="field">
                    <textarea spellcheck="false" name="description" value="<?php echo $row['description']; ?>" required></textarea>
                    <label>Description</label>
                </div>
                <div class="date">
                    <div class="field">
                        <input type="date" class="date" name="start-date" value="<?php echo $row['start_date']; ?>" required>
                        <label>Open Registration Date</label>
                    </div>
                    <div class="field">
                        <input type="date" class="date" name="end-date" value="<?php echo $row['name']; ?>" ?>" required>
                        <label>Close Registration Date</label>
                    </div>
                </div>
                <div class="field">
                    <input type="number" name="registration-fee" value="<?php echo $row['reg_fee']; ?>" required>
                    <label>Registration Fee</label>
                </div>
                <div class="field">
                    <input type="text" name="registration-link" value="<?php echo $row['reg_link']; ?>" required>
                    <label>Registration link</label>
                </div>
                <div class="field">
                    <input type="text" name="contact-person" value="<?php echo $row['cp']; ?>" required>
                    <label>Contact Person</label>
                </div>
                <div class="upload-poster">
                <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" required>
                </div>
                <div class="submit-btn">
                    <input type="submit" name="update-seminar" value="Input">
                </div>
            </form>
        </div>
    </div>

    
    <script src="../js/competition-form.js"></script>
</body>
</html>