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


    if(isset($_POST["input"])){
        $title = $_POST["title"];
        $desc = $_POST["description"];
        $date = $_POST["date"];
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
    
            move_uploaded_file($tmpName, '../image/news/' . $newImageName);
            $title = mysqli_real_escape_string($conn, $title);
            $desc = mysqli_real_escape_string($conn, $desc);
            $date = mysqli_real_escape_string($conn, $date);
            $newImageName = mysqli_real_escape_string($conn, $newImageName);

            // Replace new lines with HTML line breaks
            $desc = nl2br($desc);

            $query = "INSERT INTO news VALUES('', '$title','$desc', '$date', '$newImageName')";
            mysqli_query($conn, $query);
            echo
            "
            <script>
            alert('Successfully Added');
            document.location.href = '../../admin-news.php';
            </script>
            ";
            }
        }
    }
?>

