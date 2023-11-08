<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "praktikumpbw";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $slot = isset($_POST["slot"]) ? $_POST["slot"] : "";
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";

        $sql = "INSERT INTO modul9_tabel1 (slot, name, email) VALUES ('$slot', '$name','$email')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "<script>
                alert('Data inserted successfully');
                document.location.href='php09F.php'
                </script>";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
?>