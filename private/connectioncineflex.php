<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "cineflex";


try {
  $location = "mysql:host=$servername;dbname=$databaseName;charset=utf8";
  $conn = new PDO($location, $username, $password);
    }
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die();
    }
?>