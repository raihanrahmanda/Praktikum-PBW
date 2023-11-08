<?php


  //Create new connection
    $servername = "localhost";
    $username = "root";
    $password = "root"; //password default " "
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
        //$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // set the resulting array to associative
        //echo "Connected successfully";
        
        $sql="SELECT * FROM anggota";
  
        // $result=$conn->query($sql);
        // $result->setFetchMode(PDO::FETCH_ASSOC);

        
        // var_dump($result);
        // $row = $result->fetch();
        // var_dump($row) ;
        // $rows = $result->fetchAll();
        // var_dump($rows);

        //$result->setFetchMode(PDO::FETCH_ASSOC);

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
        // $result=$conn->query($sql);
        // $result->setFetchMode(PDO::FETCH_ASSOC);
        // $rows = $result->fetchAll();
        
        // foreach ($rows as $value){
        //   echo "Nama: ", $value["nama"], "<br>\n";
        //   echo "Jenis Kelamin: ",$value["jenis_kelamin"], "<br>\n";
        //   echo "Email: ",$value["email"],"<br>\n";
        // }       
        
        $result=$conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows= $result->fetchAll();

    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  



?> 