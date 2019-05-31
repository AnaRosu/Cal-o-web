<?php
require '../config.php';
require_once '../app/init.php';
   function dbConnect(){
     try {
       $conn = new PDO ('mysql:host=localhost;dbname=' . DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
       return $conn;
     } catch (PDOException $e) {
       echo 'ERROR', $e->getMessage();
     }
   }
?>
