<?php
try{
    $servername = "localhost";
    $username = "root";
    $password = "root"; //password default " "
    
    $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
    //set PDO error to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    $id=$_GET["id"];          

    $sql=" DELETE FROM anggota WHERE id=$id
        ";

    $conn->exec($sql);
    //echo"Berhasil Dihapus";      
    echo"
              <script>
                alert('Berhasil Dihapus');
                document.location.href='anggota.php';      
              </script>
            ";
    $conn = null;
}

catch(PDOException $e){
    echo "Koneksi gagal:".$e->getMessage();
}



?>