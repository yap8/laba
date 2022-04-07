<?php
  include_once('./partials/db.php');

  $id = $_GET['id'];

  $sql = "SELECT * FROM movies WHERE id = '$id'";

  $result = $conn->query($sql);

  $movies = $result->fetch_all(MYSQLI_ASSOC);

  $movie = $movies[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('partials/head.php'); ?>
  <title>Информация</title>
</head>
<body>

  <div class="container">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title"><?php echo $movie['title']; ?></h1>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <b>Страна: </b><?php echo $movie['country']; ?>
        </li>
        <li class="list-group-item">
          <b>Год: </b><?php echo $movie['year']; ?>
        </li>
        <li class="list-group-item">
          <b>Статус: </b><?php echo $movie['status']; ?>
        </li>
        <li class="list-group-item">
          <b>Информация: </b><?php echo $movie['info']; ?>
        </li>
      </ul>
    </div>
    <nav>
      <a href="index.php">На главную</a>
    </nav>
  </div>

</body>
</html>
