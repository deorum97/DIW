<?php
  $servername = "localhost";
  $database = "trabajo_diw";
  $username = "root";
  $password = "mysql";
  $cadenaConexion= "mysql:host=$servername;dbname=$database";

  try {
    $conn = new PDO($cadenaConexion, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    header("Location:index.php");
  }
?> 