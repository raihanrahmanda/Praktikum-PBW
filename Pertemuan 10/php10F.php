<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: php10D.php");
    exit;
}
?>


<?php include('php10F_header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }

    th {
      text-align: center;
      background-color: #f2f2f2;
    }

    td:nth-child(4),
    td:nth-child(5) {
      margin: 0 auto;
    }

    a {
      display: inline-block;
      text-decoration: none;
      color: #333;
    }

    a:hover {
      color: #666;
    }

    img {
      width: 30px;
      height: 30px;
    }

    tfoot td {
      font-weight: bold;
    }

    tfoot td[colspan="5"] {
      text-align: center;
    }

    form {
      text-align: left;
      margin-top: 20px;
    }

    input[type="submit"] {
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
  </style>
</head>

<body>
  <h1>Form Data</h1>
  <table>
    <thead>
      <tr>
        <th>Slot</th>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Remove</th>
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

      $stmt = $pdo->query("SELECT * FROM meetings ORDER BY slot");

      if ($stmt->rowCount() > 0) {
        // Output data dari setiap baris
        while ($row = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>" . $row["slot"] . "</td>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td><a href='php10G.php?slot=", $row["slot"], "'><img src='edit.png'></a></td>";
          echo "<td><a href='php10H.php?slot=", $row["slot"], "'><img src='remove.png'></a></td>";
          echo "</tr>";
        }
      }

      // Menutup koneksi ke database
      $conn = null;
      ?>
    </tbody>
  </table>

  <form action="php10E.php" method="post">
    <input type="submit" value="Tambah Data">
  </form>
</body>

</html>