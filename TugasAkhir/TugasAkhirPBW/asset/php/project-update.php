<?php
    session_start();
    require "db-config.php";
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }

    $ProjectId = $_GET["id"];

    if (isset($_POST["submit"])) {
        $name = htmlspecialchars($_POST["name"]);
        $organizer = htmlspecialchars($_POST["organizer"]);
        $date = $_POST["date"];
        $ranking = htmlspecialchars($_POST["ranking"]);
        $description = htmlspecialchars($_POST["description"]);

        $query = "UPDATE competitions_history SET 
            `name` = '$name',
            `organizer` = '$organizer',
            `date` = '$date',
            `ranking` = '$ranking',
            `description` = '$description'
            WHERE `id` = '$ProjectId'";

        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Successfully updated');
                window.location.href = '../../project.php';
            </script>";
        } else {
            echo "<script>alert('Error updating record: " . mysqli_error($conn) . "');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="../css/news-form-style.css">
    <link rel="stylesheet" href="../css/project-update-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../image/logo-title-final.svg" type="image/icon type">
    <title>Project Update - CatchAW</title>
</head>
<body>
    <?php
        $query = "SELECT * FROM competitions_history WHERE id = '$ProjectId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container">
        <div class="wrapper">
            <div class="title">
                <h1>Competition Update</h1>
                <p>please fill the form with <span>credible</span> informations</p>
            </div>
            <form action=""  method="post" enctype="multipart/form-data">
                <div class="form-content">
                    <div class="field">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                        <label>Name</label>
                    </div>
                    <div class="field">
                        <input type="text" name="organizer" value="<?php echo $row['organizer']; ?>" required>
                        <label>Organizer</label>
                    </div>
                    <div class="date">
                        <div class="field">
                            <input type="date" class="date" name="date" value="<?php echo $row['date']; ?>" required>
                            <label>Date</label>
                        </div>
                    </div>
                    <div class="field">
                        <input type="text" name="ranking" value="<?php echo $row['ranking']; ?>" required>
                        <label>Ranking</label>
                    </div>
                    <div class="field">
                        <textarea spellcheck="false" name="description" value="<?php echo $row['description']; ?>" required></textarea>
                        <label>Description</label>
                    </div>

                    <div class="submit-btn">
                        <input type="submit" name="submit" value="Input">
                    </div>

                    <div class="delete-btn">
                        <a href="project-delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/news-form.js"></script>
</body>
</html>