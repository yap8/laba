<?php
$conn = new mysqli('localhost', 'root', '', 'movies');

if (isset($_POST['add'])){
  $title = $_POST['title'];
  $country = $_POST['country'];
  $year = $_POST['year'];
  $info = $_POST['info'];

  $sql = "INSERT INTO movies (id, title, country, year, info) VALUES (NULL, '$title', '$country', '$year', '$info');";

  $result = $conn->query($sql);
}

header('Location: index.php');
