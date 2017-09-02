<?php

$host       = 'localhost';
$user       = 'root';
$password   = '';
$database   = 'db_test';
$mysqli     = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_errno) {
  die ('Error'. $mysqli->connect_error);
}

