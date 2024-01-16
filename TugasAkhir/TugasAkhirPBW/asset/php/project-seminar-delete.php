<?php
    session_start();
    require "db-config.php";
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }

    $SeminarId = $_GET["id"];
    $sql = "DELETE FROM seminar_history WHERE id = $SeminarId";
    $query = mysqli_query($conn, $sql);

   echo 
   "<script>
   alert('Data has been deleted!');
   window.location.href='../../project.php';
   </script>";
?>