<?php


  //Create new connection
    $id=$_GET["id"];
    
    $servername = "localhost";
    $username = "root";
    $password = "root"; //password default " "
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception

        $sql="DELETE FROM anggota WHERE id=$id";
  
        $result=$conn->exec($sql);
        //echo "<br/><br/>Berhasil Dihapus";
        echo"
              <script>
                alert('Berhasil Dihapus');
                document.location.href='anggota.php';      
              </script>
            ";
        
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  



?> 