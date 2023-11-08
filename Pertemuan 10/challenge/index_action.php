<?php
// memulai session
session_start();

function destroy_session_and_data()
{
  session_unset();
  if (session_id() != "" || isset($_COOKIE[session_name()])) {
    setcookie(
      session_name(),
      session_id(),
      time() - 22222222,
      '/'
    );
  }
  session_destroy();
}

function count_requests()
{
  if (!isset($_SESSION['requests'])) {
    $_SESSION['requests'] = 1;
  } else {
    $_SESSION['requests']++;
  }
  return $_SESSION['requests'];
}

// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
  echo $sql . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // mengambil nilai input dari form
  $username = $_POST["username"];
  $words = $_POST["words"];

  // Query untuk menyimpan data ke tabel "form"
  $sql = "INSERT INTO word (username, words) VALUES ('$username', '$words')";
  $conn->exec($sql);
  header("Location: index.php");
}

// Menutup koneksi ke database
$conn = null;
?>