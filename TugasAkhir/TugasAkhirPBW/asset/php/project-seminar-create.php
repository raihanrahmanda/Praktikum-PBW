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
    
    $UserId = $row['id'];
    
    if(isset($_POST["submit"])){
        $name = htmlspecialchars($_POST["name"]);
        $organizer = htmlspecialchars($_POST["organizer"]);
        $date = $_POST["date"];
        $description = htmlspecialchars($_POST["description"]);

        $query = "INSERT INTO seminar_history VALUES ('','$UserId','$name', '$organizer', '$date', '$description')";
        mysqli_query($conn, $query);
        echo
        "
        <script>
        alert('Successfully Added');
        document.location.href = '../../project.php';
        </script>
        ";
    }

?>