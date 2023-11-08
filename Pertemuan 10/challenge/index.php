<?php
require_once 'index_action.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    p, h1{
      text-align: center;
      color: #333;
    }

    h2 {
      margin-top: 50px;
      margin-left: 300px;
      color: #333;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"]{
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    table {
      margin-left: 300px;
      width: 50%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table th,
    table td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    table th {
      background-color: #f2f2f2;
      font-weight: bold;
      text-align: left;
    }
  </style>
</head>

<body>
  <h1>Mini Dictionary</h1>

  <?php
  echo "<p>" . "Hallo, pengunjung ke - " . count_requests() . "</p>";
  ?>

  <form method="post" action="index_action.php">
    <label for="username">Name:</label>
    <input type="text" id="username" name="username" required><br>
    <label for="words">Words:</label>
    <input type="text" id="words" name="words" required><br><br>
    <input type="submit" value="Submit">
  </form>
  
  <h2>Daftar Kata</h2>
  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Kata</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Konfigurasi database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "form";

      try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      } catch (PDOException $e) {
        echo $sql . $e->getMessage();
      }

      $stmt = $pdo->query("SELECT * FROM word");

      if ($stmt->rowCount() > 0) {
        // Output data dari setiap baris
        while ($row = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>" . $row["username"] . "</td>";
          echo "<td>" . $row["words"] . "</td>";
          echo "</tr>";
        }
      }

      // Menutup koneksi ke database
      $conn = null;
      ?>
    </tbody>
  </table>
</body>

</html>