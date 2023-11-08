<?php


  $servername = "localhost";
  $username = "root";
  $password = "root"; //password default " "
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      //-------------------------------------database, semua field---------------------------------------------
      $id= $_POST["id"];
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

      //simplified, jangan lupa untuk id
      $sql="UPDATE `anggota` SET 
           nama='$nama',tanggal_lahir='$tanggal_lahir',email='$email',jenis_kelamin='$jenis_kelamin',is_php='$is_php',is_java='$is_java',is_python='$is_python',alasan='$alasan',matkul_fav='$matkul_fav' 
            WHERE id=$id
          ";                               

      
      $conn->exec($sql);

      echo "Data berhasil diperbaharui.";

      $conn = null;

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }


?> 