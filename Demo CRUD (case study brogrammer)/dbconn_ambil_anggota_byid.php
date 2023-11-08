<?php
try{
    $servername = "localhost";
    $username = "root";
    $password = "root"; //password default " "
    
    $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
    //set PDO error to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

              
    $sql=" SELECT * FROM anggota WHERE id=$id;
        ";

        $result=$conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        //var_dump($row);
           
    
    $conn = null;
}

catch(PDOException $e){
    echo "Koneksi gagal:".$e->getMessage();
}



?>