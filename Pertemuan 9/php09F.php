<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP09F</title>
    <style>
        table{
            border-collapse : collapse;
            width : 40%;
        }
        th,td{
            border : 1px solid black;
            padding : 5px;
            text-align : left;
        }
        th{
            background-color : grey;
            text-align : center;
        }
        a {
            margin-top: 100px;
        }
    </style>
</head>
<body>
<?php
    $db_hostname = "localhost"; // Write your own db server here
    $db_database = "praktikumpbw"; // Write your own db name here
    $db_username = "root"; // Write your own username here
    $db_password = ""; // Write your own password here
    // For the best practice, don’t use your “real” password when submitting your work
    $db_charset = "utf8mb4"; // Optional
    $dsn ="mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    );
    try {
        $pdo = new PDO($dsn,$db_username,$db_password,$opt);
        echo "<h1>Data in meeting table</h1>\n";
        $stmt = $pdo->query("SELECT * FROM modul9_tabel1 ORDER BY slot ASC");
        echo "Rows retrieved: ".$stmt->rowcount()."<br><br>\n";

        if ($stmt->rowcount()>0) {
            echo "<table>
                <tr>
                    <th>Slot</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Update</th>
                </tr>";
        
            while ($row = $stmt->fetch()) {
                echo "<tr>
                        <td> ".$row["slot"]."</td>
                        <td> ".$row["name"]."</td>
                        <td> ".$row["email"]."</td>
                        <td> <a href='php09G.php?slot=",$row["slot"],"'><img src='edit.png' style='width:30px;height:30px;margin-left:5px;'></a>
                             <a href='php09H.php?slot=",$row["slot"],"'><img src='remove.png' style='width:30px;height:30px;margin-left:5px;'></a></td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data meetings";
        }
        $pdo = NULL;
    } catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
    ?>
    <br>
    <a href="php09E.php">
        <input type="button" value="input data">
    </a>
</body>
</html>