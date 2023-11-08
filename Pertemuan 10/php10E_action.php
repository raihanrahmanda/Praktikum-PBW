<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
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

    <h1>Logs : </h1>
    <?php
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
        $slot = $_POST["slot"];
        $name = $_POST["name"];
        $email = $_POST["email"];

        // Query untuk menyimpan data ke tabel "form"
        $sql = "INSERT INTO meetings (slot, name, email) VALUES ('$slot', '$name', '$email')";
        $conn->exec($sql);
        // message with html syntax with timestamp
        echo "<p>" . date("Y-m-d h:i:sa") . " - Data sukses masuk ke database</p>";
    }

    // Menutup koneksi ke database
    $conn = null;
    ?>

    <form action="php10F.php" method="post">
        <input type="submit" value="Lihat Data">
    </form>
</body>

</html>