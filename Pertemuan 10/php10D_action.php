<?php
session_start();
?>

<?php
try {
    // Konfigurasi database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username
    $sql = "SELECT * FROM user WHERE username='$username'";

    $result = $conn->query("$sql");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();

    // var_dump($row);
    if ($row) {
        // cek password
        if ($row['password'] === $password) {
            // login berhasil
            // echo "Login berhasil";
            $_SESSION['username'] = $_POST['username'];
            header("Location: php10F.php"); //mengarahkan ke halaman php10F
        } else {
            // login gagal
            echo "Login gagal";
        }
    } else {
        // username tidak ditemukan
        echo "Username tidak ditemukan";
    }
    $conn = null;
} catch (PDOException $e) {
    echo " Koneksi gagal: " . $e->getMessage();
}

?>