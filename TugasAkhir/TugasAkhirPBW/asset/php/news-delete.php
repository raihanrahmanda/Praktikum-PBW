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

    $Newsid = $_GET['id'];
    $sql = "DELETE FROM news WHERE id = $Newsid";
    $query = mysqli_query($conn, $sql);

   echo 
   "<script>
   alert('Data has been deleted!');
   window.location.href='../../admin-news.php';
   </script>";
?>