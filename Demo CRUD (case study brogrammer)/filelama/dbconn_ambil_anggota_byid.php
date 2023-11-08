<?php

      //Create new connection
      $servername = "localhost";
      $username = "root";
      $password = "root"; //password default " "
      
      try {
          $conn = new PDO("mysql:host=$servername;dbname=brogrammer", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // set the resulting array to associative
          //echo "Connected successfully";
          
          
          $sql="SELECT * FROM anggota WHERE id=$id";
      
          $result=$conn->query($sql);
          $result->setFetchMode(PDO::FETCH_ASSOC);
          $rows=$result->fetch();

      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
  


?> 