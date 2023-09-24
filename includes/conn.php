<?php 


$servername = "localhost";


try {
  $database = new PDO("mysql:host=$servername;dbname=restbakouan", 'root', '');
  // set the PDO error mode to exception
  $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
