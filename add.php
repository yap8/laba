<?php
include_once('db.php');

if (isset($_POST['add'])){
  $title = $_POST['title'];
  $country = $_POST['country'];
  $year = $_POST['year'];
  $status = $_POST['status'];
  $info = $_POST['info'];

  $sql = "INSERT INTO movies (id, title, country, year, status, info) VALUES ('NULL', '$title', '$country', '$year', '$status', '$info');";

  $result = $conn->query($sql);
}

header('Location: index.php');
