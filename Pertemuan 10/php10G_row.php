<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $slot = $_GET['slot'];

    // cara 1
    $stmt = "SELECT * FROM meetings WHERE slot='$slot'";
    $stmt = $conn->query("select * from meetings where slot='$slot'");
    $row = $stmt->fetch();
    $conn = null;
} catch (PDOException $e) {
    echo "Koneksi gagal" . $e->getMessage();
}
?>