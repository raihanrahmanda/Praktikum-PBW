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
    
    if(isset($_POST["input-comp"])){
        $name = $_POST["name"];
        $organizer = $_POST["organizer"];
        $desc = $_POST["description"];
        $open_date = $_POST["start-date"];
        $close_date = $_POST["end-date"];
        $requirement = $_POST["requirement"];
        $reg_fee = $_POST["registration-fee"];
        $reg_link = $_POST["registration-link"];
        $guide_link = $_POST["guidebook-link"];
        $cp = $_POST["contact-person"];

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
    
            move_uploaded_file($tmpName, '../image/lomba/' . $newImageName);
            $query = "INSERT INTO competitions VALUES('', '$name','$organizer','$desc', '$open_date', '$close_date','$requirement','$reg_fee','$reg_link','$guide_link','$cp','$newImageName')";
            mysqli_query($conn, $query);
            
            echo
            "
            <script>
            alert('Successfully Added');
            document.location.href = '../../admin-competitions.php';
            </script>
            ";
            }
        }
    }
?>