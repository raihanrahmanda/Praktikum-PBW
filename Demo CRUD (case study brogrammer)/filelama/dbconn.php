<?php

function newConn(){
  $servername = "localhost";
  $username = "root";
  $password = "root"; //password default " "
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
      //echo "Connected successfully";     
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}


// ---------------------- query: insert-----------------------------------
function tambahAnggota(){
   //coba dulu query di phpmyadmin baru copas ke sini
    newConn();

    //--------------------------------- data predefined ------------------------------------------------------
    // $query="INSERT INTO anggota (`nama`,`tanggal_lahir`,`email`,`password`,`jenis_kelamin`) VALUES 
    //         (Sheldon Cooper', '1985-11-01', 'sheldon@example.com', 'A1234567', '1')
    //         ";
    

    //------------------------------------database, sebagian field------------------------------------------
    // $nama=$_POST["nama"];
    // $bday=$_POST["bday"];
    // $email=$_POST["email"];
    // $pwd=$_POST["pwd"];

    // $query="INSERT INTO anggota (`nama`,`tanggal_lahir`,`email`,`password`,`jenis_kelamin`) VALUES 
    //         ('$nama', '$bday', '$email', '$pwd', '1')
    //         ";


    //-------------------------------------database, semua field---------------------------------------------
    $nama= isset($_POST["nama"]) ? $_POST["nama"] : "";
    $bday= isset($_POST["bday"]) ? $_POST["bday"] : "";
    $email=isset($_POST["email"]) ? $_POST["email"] : "";
    $pwd=isset($_POST["pwd"]) ? $_POST["pwd"] : "";
    $jenis_kelamin=isset($_POST["jeniskelamin"]) ? $_POST["jeniskelamin"] : "";
    $is_php=isset($_POST["isphp"]) ? $_POST["isphp"] : "Tidak";
    $is_java=isset($_POST["isjava"]) ? $_POST["isjava"] : "Tidak";
    $is_python=isset($_POST["ispython"]) ? $_POST["ispython"] : "Tidak";
    $alasan=isset($_POST["alasan"]) ? $_POST["alasan"] : "";
    $matkul_favorit=isset($_POST["matkul_favorit"]) ? $_POST["matkul_favorit"] : "";


    // $query="INSERT INTO anggota (`nama`,`tanggal_lahir`,`email`,`password`,`jenis_kelamin`,`is_php`,`is_java`,`is_python`,`alasan`,`matkul_fav`) VALUES 
    //     ('$nama', '$bday', '$email', '$pwd', '$jenis_kelamin', '$is_php', '$is_java', '$is_python','$alasan','$matkul_favorit' )
    //     ";

    //simplified, jangan lupa untuk id
    $sql="INSERT INTO anggota  VALUES 
        ('', '$nama', '$bday', '$email', MD5('$pwd'), '$jenis_kelamin', '$is_php', '$is_java', '$is_python','$alasan','$matkul_favorit' )
        ";

    $conn->exec($sql);

    //echo "Data berhasil ditambahkan.";

    $last_id = $conn->lastInsertId();
    echo "Data berhasil ditambahkan. Id terakhir: " . $last_id;
    $conn = null;
}

// ---------------------- query: read-------------------------------------

function selectAnggota(){
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
        return $result->fetchAll();

    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  
}


// ---------------------- query: update-----------------------------------

// ---------------------- query: delete-----------------------------------

?> 