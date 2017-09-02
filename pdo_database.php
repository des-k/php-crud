<?php

  $host       = 'localhost';
  $user       = 'root';
  $password   = '';
  $database   = 'db_test';
  $pdo        = null;
  try 
  {
     $pdo = new PDO("mysql:host=".$host.";"."dbname=".$database, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
        die($e->getMessage());
  }