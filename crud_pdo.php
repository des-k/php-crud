<?php

require_once("pdo_database.php");

if (isset($_POST['create'])) {
  $host     = $_POST['host'];
  $user     = $_POST['user'];
  $password = $_POST['password'];
  
  $insert   = $pdo->prepare("insert into passwords(host, user, password) values(?, ?, ?)");
  $insert->execute(array($host, $user, $password));
}

if (isset($_GET['edit'])) {
  $id         = $_GET['edit'];
  $single     = $pdo->prepare("select * from passwords where id = ?");
  $single->execute(array($id));
  $singleRow  = $single->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['update'])) {
  $id       = $_GET['edit'];
  $host     = $_POST['host'];
  $user     = $_POST['user'];
  $password = $_POST['password'];
  
  $update   = $pdo->prepare("update passwords set host=?, user=?, password=? where id=?");
  $update->execute(array($host, $user, $password, $id));
  
  header("Location: index.php");
}

if (isset($_GET['delete'])) {
  $id     = $_GET['delete'];
  $delete = $pdo->prepare("delete from passwords where id=?");
  $delete->execute(array($id));
  header("Location: index.php");
}

$select     = $pdo->prepare("select * from passwords");
$select->execute();
$data     = $select->fetchAll();

$pdo = null;