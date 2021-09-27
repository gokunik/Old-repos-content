<?php

session_start();

$con = mysqli_connect('localhost','root','','cab');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>