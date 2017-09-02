<?php

require_once("mysqli_database.php");

if (isset($_POST['create'])) {
  #do create
  $host     = $_POST['host'];
  $user     = $_POST['user'];
  $password = $_POST['password'];
  
  $insert   = $mysqli->prepare("insert into passwords(host, user, password) values(?, ?, ?)");
  $insert->bind_param("sss", $host, $user, $password);
  $insert->execute();
   
}

if (isset($_GET['edit'])) {
  $id         = $_GET['edit'];
  $single     = $mysqli->prepare("select * from passwords where id = ?");
  $single->bind_param("i", $id);
  $single->execute();
  $result     = $single->get_result();
  $singleRow  = $result->fetch_assoc(); 
}


if (isset($_POST['update'])) {
  $id       = $_GET['edit'];
  $host     = $_POST['host'];
  $user     = $_POST['user'];
  $password = $_POST['password'];
  
  $update   = $mysqli->prepare("update passwords set host=?, user=?, password=? where id=?");
  $update->bind_param("sssi", $host, $user, $password, $id );
  $update->execute();
  header("Location: index.php");
  
}

if (isset($_GET['delete'])) {
  $id     = $_GET['delete'];
  $delete = $mysqli->prepare("delete from passwords where id=?");
  $delete->bind_param("i", $id);
  $delete->execute();
  
  header("Location: index.php");
}
  
$select     = $mysqli->prepare("select * from passwords");
$select->execute();
$result     = $select->get_result();
$data       = array();

if ($result->num_rows > 0){
  while ($row = $result->fetch_assoc()){
    $data[] = $row;
  };
}


$mysqli->close();






