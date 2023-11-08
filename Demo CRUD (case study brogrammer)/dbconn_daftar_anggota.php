<?php
try{
    $servername = "localhost";
    $username = "root";
    $password = "root"; //password default " "
    
    $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
    //set PDO error to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

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


    // $sql= "INSERT INTO anggota (`nama`,`tanggal_lahir`,`email`,`password`,`jenis_kelamin`) VALUES 
    //         ('$nama', '$tanggal_lahir', '$email', '$pwd', '$jenis_kelamin')
    //         ";   
            
    //$sql="INSERT INTO anggota (`nama`,`tanggal_lahir`,`email`,`password`,`jenis_kelamin`,`is_php`,`is_java`,`is_python`,`alasan`,`matkul_fav`) VALUES 
    //        ('$nama', '$tanggal_lahir', '$email', '$pwd', '$jenis_kelamin', '$is_php', '$is_java', '$is_python','$alasan','$matkul_fav' )
    //        ";
			
	//simplified, jangan lupa untuk id
      $sql="INSERT INTO anggota  VALUES 
          ('', '$nama', '$tanggal_lahir', '$email', '$pwd', '$jenis_kelamin', '$is_php', '$is_java', '$is_python','$alasan','$matkul_fav' )
          ";  

    $conn->exec("$sql");
    //echo "Data berhasil ditambahkan.";

    $last_id = $conn->lastInsertId();
    echo "Data berhasil ditambahkan. Id terakhir: " . $last_id;
    
    $conn = null;
}

catch(PDOException $e){
    echo "Koneksi gagal:".$e->getMessage();
}



?>