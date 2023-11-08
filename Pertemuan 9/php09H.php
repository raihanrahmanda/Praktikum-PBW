<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "praktikumpbw";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $slot = $_GET['slot'];

        $sql = "DELETE FROM `modul9_tabel1` WHERE slot='$slot'";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "<script>
                alert('Data deleted successfully');
                document.location.href='php09F.php'
                </script>";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
?>
