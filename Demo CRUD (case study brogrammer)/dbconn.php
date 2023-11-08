<?php
try{
    $servername = "localhost";
    $username = "root";
    $password = "root"; //password default " "
    
    $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
    //set PDO error to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    echo "Connected successfully";
}

catch(PDOException $e){
    echo "Koneksi gagal:".$e->getMessage();
}



?>