<?php


  $servername = "localhost";
  $username = "root";
  $password = "root"; //password default " "
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully"; 
      
      //coba dulu query di phpmyadmin baru copas ke sini
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
      $tanggal_lahir= isset($_POST["tanggal_lahir"]) ? $_POST["tanggal_lahir"] : "";
      $email=isset($_POST["email"]) ? $_POST["email"] : "";
      $pwd=isset($_POST["pwd"]) ? $_POST["pwd"] : "";
      $jenis_kelamin=isset($_POST["jenis_kelamin"]) ? $_POST["jenis_kelamin"] : "";
      $is_php=isset($_POST["isphp"]) ? $_POST["isphp"] : "Tidak";
      $is_java=isset($_POST["isjava"]) ? $_POST["isjava"] : "Tidak";
      $is_python=isset($_POST["ispython"]) ? $_POST["ispython"] : "Tidak";
      $alasan=isset($_POST["alasan"]) ? $_POST["alasan"] : "";
      $matkul_fav=isset($_POST["matkul_fav"]) ? $_POST["matkul_fav"] : "";


      // $query="INSERT INTO anggota (`nama`,`tanggal_lahir`,`email`,`password`,`jenis_kelamin`,`is_php`,`is_java`,`is_python`,`alasan`,`matkul_fav`) VALUES 
      //     ('$nama', '$bday', '$email', '$pwd', '$jenis_kelamin', '$is_php', '$is_java', '$is_python','$alasan','$matkul_favorit' )
      //     ";

      //simplified, jangan lupa untuk id
      $sql="INSERT INTO anggota  VALUES 
          ('', '$nama', '$tanggal_lahir', '$email', '$pwd', '$jenis_kelamin', '$is_php', '$is_java', '$is_python','$alasan','$matkul_fav' )
          ";                               //belum MD5

      $conn->exec($sql);

      //echo "Data berhasil ditambahkan.";

      $last_id = $conn->lastInsertId();
      echo $sql;
      echo "Data berhasil ditambahkan. Id terakhir: " . $last_id;
      $conn = null;

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }


?> 