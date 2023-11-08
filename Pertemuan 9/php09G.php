<!DOCTYPE html>
<html>
<head>
	<title>PHP09G</title>
	<style>
		form {
			margin: 50px auto;
			width: 50%;
		}
		label {
			display: block;
			margin-bottom: 5px;
			font-size: 18px;
			font-weight: bold;
		}
		input[type="text"] {
			display: block;
			margin-bottom: 20px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 100%;
			font-size: 16px;
		}
		input[type="submit"] {
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 18px;
			justify-content : center;
		}
        h1 {
            margin: 0 auto;
            text-align: center;
            padding: 0;
        }
	</style>
</head>
<body>
    <?php
    $db_hostname = "localhost"; 
    $db_database = "praktikumpbw"; 
    $db_username = "root"; 
    $db_password = ""; 
    $db_charset = "utf8mb4"; 
    
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    );
    try {
        $pdo = new PDO($dsn,$db_username,$db_password,$opt);
        $slot = $_GET["slot"];
        $stmt = $pdo->prepare("SELECT * FROM modul9_tabel1 WHERE slot=:slot");
        $stmt->bindParam(":slot",$slot,PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // atau pakai $stmt->execute([":slot"=>$slot]);
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    echo '<h1>Update Meeting</h1>';
    echo '<form action="php09G_action.php" method="post">
		<label for="slot">Slot:</label>
		<input type="text" name="slot" id="slot" placeholder="Enter slot..." value="'.$data["slot"].'" required >
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" placeholder="Enter name..." value="'.$data["name"].'" required>
		<label for="email">Email:</label>
		<input type="text" name="email" id="email" placeholder="Enter email..." value="'.$data["email"].'" required>
		<input type="submit" value="Submit">
	</form>';
    ?>
</body>
</html>