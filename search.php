<?php
  include_once('db.php');

  $query = mb_strtolower($_POST['title']);

  if ($query === '') {
    header("Location: index.php");
  }

  if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM movies;";

    $result = $conn->query($sql);

    $movies = $result->fetch_all(MYSQLI_ASSOC);

    $result = [];

    foreach ($movies as $movie) {
      $title = mb_strtolower($movie['title']);

      if (strpos($title, $query) !== false) {
        array_push($result, $movie['id']);
      }
    }

    $result = implode($result, ',');

    header("Location: index.php?ids=$result&query=$query");
  }
