<?php
try{
    $servername = "localhost";
    $username = "root";
    $password = "root"; //password default " "
    
    $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
    //set PDO error to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

              
    $sql=" SELECT * FROM anggota
        ";

    // $result=$conn->query("$sql");
    // $result->setFetchMode(PDO::FETCH_ASSOC);
    // $row=$result->fetch();
    // $rows=$result->fetchAll();
    // var_dump($rows);

    //cara 1
        // $result=$conn->query($sql);
        // $result->setFetchMode(PDO::FETCH_ASSOC);

        // foreach($result as $value) {
        //   echo "Nama: ", $value["nama"], "<br>\n";
        //   echo "Jenis Kelamin: ",$value["jenis_kelamin"], "<br>\n";
        //   echo "Email: ",$value["email"],"<br>\n";
        // }

    //cara 2
        // $result=$conn->query($sql);
        // $result->setFetchMode(PDO::FETCH_ASSOC);
        
        // while ($row = $result->fetch()){
        //   echo "Nama: ", $row["nama"], "<br>\n";
        //   echo "Jenis Kelamin: ",$row["jenis_kelamin"], "<br>\n";
        //   echo "Email: ",$row["email"],"<br>\n";
        // }  

        //cara 3
        $result=$conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $result->fetchAll();
        
           
    
    $conn = null;
}

catch(PDOException $e){
    echo "Koneksi gagal:".$e->getMessage();
}



?>