<?php
    session_start();
    require "db-config.php";
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }

    $ProjectId = $_GET["id"];
    $sql = "DELETE FROM competitions_history WHERE id = $ProjectId";
    $query = mysqli_query($conn, $sql);

   echo 
   "<script>
   alert('Data has been deleted!');
   window.location.href='../../project.php';
   </script>";
?>