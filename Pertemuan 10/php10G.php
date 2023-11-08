<?php
$slot = $_GET['slot'];
require "php10G_row.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"] {
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
  </style>
</head>

<body>
  <h1>Update Form</h1>
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

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $slot = $_GET["slot"];

    $stmt = $pdo->prepare("SELECT * FROM meetings WHERE slot = :slot");
    $stmt->bindParam(":slot", $slot);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch();
      $name = $row["name"];
      $email = $row["email"];
    }
  }
  ?>

  <form method="POST" action="php10G_action.php">
    <input type="hidden" name="slot" value="<?php echo $slot; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $email; ?>"><br><br>
    <input type="submit" value="Update">
  </form>
</body>

</html>