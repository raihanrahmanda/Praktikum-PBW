<?php
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

    if(isset($_POST["input"])){
        $fname = $_POST["full_name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $nim = $_POST["nim"];
        $email = $_POST["email"];
        $telno = $_POST["telno"];
        $skills = $_POST["skill"];
        $skills1 = implode("<br>", $skills);
        
        if($_FILES["image"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
        }else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
    
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
            echo
            "
            <script>
            alert('Invalid Image Extension');
            </script>
            ";
        }
        else if($fileSize > 1000000){
            echo
            "
            <script>
            alert('Image Size Is Too Large');
            </script>
            ";
        }
        else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
    
            move_uploaded_file($tmpName, '../image/user/' . $newImageName);
            $query = "INSERT INTO users VALUES('', '$fname','$username','$password' ,'$nim', '$email', '$telno', '$skills1', '$newImageName', 'user')";
            mysqli_query($conn, $query);
            echo
            "
            <script>
            alert('Successfully Added');
            document.location.href = '../../admin-users.php';
            </script>
            ";
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
    <link rel="stylesheet" href="../css/edit-profile-form-style.css">
    <script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="../image/logo-title-final.svg" type="image/icon type">
    <title>Competition Form Page</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title">
                <h1>Users Form</h1>
                <p>please fill the form with <span>credible</span> informations</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field">
                    <input type="text" name="full_name" required>
                    <label>Full Name</label>
                </div>
                <div class="field">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="field">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="field">
                    <input type="text" name="nim" required>
                    <label>NIM</label>
                </div>
                <div class="field">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="field">
                    <input type="text" name="telno" required>
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
                    <input type="submit" name="input" value="Input">
                </div>
            </form>
        </div>
    </div>

    
    <script src="../js/competition-form.js"></script>
    <script src="../js/edit-profile-form.js"></script>
</body>
</html>