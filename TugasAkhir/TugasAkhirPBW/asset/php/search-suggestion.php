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
    $searchText = $_GET['search'];


    $sql = "SELECT full_name FROM users WHERE full_name LIKE '%$searchText%'";
    $result = $conn->query($sql);

    $suggestions = array();

    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row["full_name"];
    }
    }

    // Close database connection
    $conn->close();

    // Return suggestions as JSON response
    header('Content-Type: application/json');
    echo json_encode($suggestions);
?>

