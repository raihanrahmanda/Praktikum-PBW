<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        //ini dulu
        var_dump($_POST); 
    ?>
    

    
    <h2>Selamat datang, <?php if (isset($_POST["nama"])) echo $_POST["nama"]?></h2> 
    <br>
    Data yang kamu inputkan adalah:
    <ul>
        <li>Tanggal lahir: <?php if (isset($_POST["bday"])) echo $_POST["bday"]?> </li>
        <li>Email: <?php if (isset($_POST["email"])) echo $_POST["email"]?> </li>
        <li>Jenis Kelamin: <?php if (isset($_POST["jeniskelamin"])) echo $_POST["jeniskelamin"]?> </li>
        <li>Ingin belajar PHP? <?php if (isset($_POST["isphp"])) echo $_POST["isphp"]?> </li>
        <li>Ingin belajar Java? <?php if (isset($_POST["isjava"])) echo $_POST["isjava"]?> </li>
        <li>Ingin belajar Python?: <?php if (isset($_POST["ispython"])) echo $_POST["ispython"]?></li>
        <li>Alasan bergabung: <?php if (isset($_POST["alasan"])) echo $_POST["alasan"]?> </li>
        <li>Mata kuliah favorit: <?php if (isset($_POST["matkul"])) echo $_POST["matkul"]?> </li>
    </ul>
</body>
</html>