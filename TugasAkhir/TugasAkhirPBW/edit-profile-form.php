<?php
session_start();
require "asset/php/db-config.php";
if (!isset($_SESSION['session_username'])) {
    header("location:login.php");
    exit();
}

$username = $_SESSION['session_username'];

if (isset($_POST["input"])) {
    $fname = sanitizeInput($_POST["full_name"]);
    $nim = sanitizeInput($_POST["nim"]);
    $email = sanitizeInput($_POST["email"]);
    $telno = sanitizeInput($_POST["telephone-number"]);
    $skills = $_POST["skill"];
    
    // Validate "skills"
    if (!isset($skills) || !is_array($skills) || count($skills) === 0) {
        echo "<script>alert('Please select at least one skill.');
        document.location.href = 'edit-profile-form.php';</script>";
    } else {
        // Process the skills array
        $skills1 = implode("<br>", $skills);
        // ... continue with the rest of the logic
    }


    if (empty($fname)) {
        echo "<script>alert('Please enter your full name.');
        document.location.href = 'edit-profile-form.php';</script>";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $fname)) {
        echo "<script>alert('Invalid full name. Please use alphabetic characters only.');
        document.location.href = 'edit-profile-form.php';</script>";
        
    }

    // Validate "telephone number" starts with "62"
    if (!preg_match('/^62/', $telno)) {
        echo "<script>alert('Telephone number must start with 62.');
        document.location.href = 'edit-profile-form.php';</script>";
    } elseif (strlen($telno) < 12 || strlen($telno) > 14) {
        echo "<script>alert('Telephone number must be between 12 and 14 characters long.');
        document.location.href = 'edit-profile-form.php';</script>";
    } else {
        // Validate "nim" length
        if (!preg_match('/^[0-9]{9}$/', $nim)) {
            echo "<script>alert('NIM must be exactly 9 digits long.');
            document.location.href = 'edit-profile-form.php';</script>";
        } else {
            // Check if "nim" is unique
            $query = "SELECT COUNT(*) as count FROM users WHERE nim = '$nim' AND username != '$username'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $nimCount = $row['count'];

            if ($nimCount > 0) {
                echo "<script>alert('NIM already exists for another user. Please choose a different NIM.');
                document.location.href = 'edit-profile-form.php';</script>";
            } else {
                if (!isset($_FILES["image"]) || $_FILES["image"]["error"] == 4) {
                    echo "<script>alert('Image Does Not Exist');</script>";
                } else {
                    $fileName = sanitizeInput($_FILES["image"]["name"]);
                    $fileSize = $_FILES["image"]["size"];
                    $tmpName = $_FILES["image"]["tmp_name"];

                    $validImageExtension = ['jpg', 'jpeg', 'png'];
                    $imageExtension = explode('.', $fileName);
                    $imageExtension = strtolower(end($imageExtension));

                    if (!in_array($imageExtension, $validImageExtension)) {
                        echo "<script>alert('Invalid Image Extension');</script>";
                    } elseif ($fileSize > 1000000) {
                        echo "<script>alert('Image Size Is Too Large');</script>";
                    } else {
                        $newImageName = uniqid();
                        $newImageName .= '.' . $imageExtension;

                        move_uploaded_file($tmpName, 'asset/image/user/' . $newImageName);

                        $query = "UPDATE users SET 
                            `full_name` = '$fname',
                            `nim` = '$nim',
                            `email` = '$email',
                            `telno` = '$telno',
                            `skills` = '$skills1',
                            `image` = '$newImageName'
                            WHERE `username` = '$username'";

                        mysqli_query($conn, $query);
                        echo "
                            <script>
                            alert('Successfully Updated');
                            document.location.href = 'profile-page.php';
                            </script>
                        ";
                    }
                }
            }
        }
    }
}

function sanitizeInput($input)
{
    $input = strip_tags($input);
    $input = str_replace(['<', '/', '>'], '', $input);
    $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    return $input;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="asset/css/header-login-style.css">
    <link rel="stylesheet" href="asset/css/edit-profile-form-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
    <title>Edit Profile Form Page</title>
</head>
<body>
    <?php
        include 'asset/php/header-login.php';
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container">
        <div class="wrapper">
            <div class="title">
                <h1>Edit Your Profile</h1>
                <p>please fill the form with <span>credible</span> informations</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field">
                    <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" required>
                    <label>Full Name</label>
                </div>
                <div class="field">
                    <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required>
                    <label>Student Number</label>
                </div>
                <div class="field">
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" required> 
                    <label>E-mail</label>
                </div>
                <div class="field">
                    <input type="text" name="telephone-number" value="<?php echo $row['telno']; ?>" required>
                    <label>Telephone Number</label>
                </div>
                <div class="skill-lists">
                    <label id="title">Skill lists</label>
                    <div class="skills-box">
                        <div class="skills">
                            <div class="skill-option">
                                <input type="checkbox" id="skill1" name="skill[]" value="Front End Development">
                                <label>Front End Development</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill2" name="skill[]" value="Back End Development">
                                <label>Back End Development</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill3" name="skill[]" value="Graphic Design">
                                <label>Graphic Design</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill4" name="skill[]" value="UX Design">
                                <label>UX Design</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill5" name="skill[]" value="Motion Graphic Design">
                                <label>Motion Graphic Design</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill6" name="skill[]" value="Animation">
                                <label>Animation</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill7" name="skill[]" value="Illustration">
                                <label>Illustration</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill8" name="skill[]" value="Photography">
                                <label>Photography</label>
                            </div>
                        </div>

                        <div class="skills">
                            <div class="skill-option">
                                <input type="checkbox" id="skill9" name="skill[]" value="Copywriting">
                                <label>Copywriting</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill10" name="skill[]" value="Budgeting">
                                <label>Budgeting</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill11" name="skill[]" value="Cloud Security">
                                <label>Cloud Security</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill12" name="skill[]" value="Data Visualization">
                                <label>Data Visualization</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill13" name="skill[]" value="Data Analysis">
                                <label>Data Analysis</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill14" name="skill[]" value="Editing Software">
                                <label>Editing Software</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill15" name="skill[]" value="Database Management">
                                <label>Database Management</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill16" name="skill[]" value="Content Strategy">
                                <label>Content Strategy</label>
                            </div>   
                        </div>

                        <div class="skills">
                            <div class="skill-option">
                                <input type="checkbox" id="skill17" name="skill[]" value="Project Management">
                                <label>Project Management</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill18" name="skill[]" value="Statistical Analysis">
                                <label>Statistical Analysis</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill19" name="skill[]" value="Typography">
                                <label>Typography</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill20" name="skill[]" value="Sound effects">
                                <label>Sound effects</label>
                            </div>
                            <div class="skill-option">
                                <input type="checkbox" id="skill21" name="skill[]" value="Machine learning">
                                <label>Machine learning</label>
                            </div>

                            <div class="skill-option">
                                <input type="checkbox" id="skill22" name="skill[]" value="Electronics Specialist">
                                <label>Electronics Specialist</label>
                            </div>

                            <div class="skill-option">
                                <input type="checkbox" id="skill23" name="skill[]" value="2D and 3D animation">
                                <label>2D and 3D animation</label>
                            </div>

                            <div class="skill-option">
                                <input type="checkbox" id="othersCheckbox" name="othersCheckbox" value="Others">
                                <input type="text" id="othersText" name="skill[]" placeholder="Others" disabled>
                            </div>         
                        </div>
                    </div>
                </div>
                <div class="upload-profile">
                    <label>Upload Profile Photo</label> <br>
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" required>
                </div>
                <div class="submit-btn">
                    <input type="submit" name="input" value="Edit Profile">
                </div>
            </form>
        </div>
    </div>

    <script src="asset/js/edit-profile-form.js"></script>
</body>
</html>