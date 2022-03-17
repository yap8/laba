<?php
  include_once('db.php');

  $id = $_GET['id'];

  $sql = "SELECT * FROM movies WHERE id = '$id'";

  $result = $conn->query($sql);

  $movies = $result->fetch_all(MYSQLI_ASSOC);

  $movie = $movies[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Информация</title>
</head>
<body>

  <h1><?php echo $movie['title']; ?></h1>
  <ul>
    <li>
      <b>Страна: </b><?php echo $movie['country']; ?>
    </li>
    <li>
      <b>Год: </b><?php echo $movie['year']; ?>
    </li>
    <li>
      <b>Статус: </b><?php echo $movie['status']; ?>
    </li>
    <li>
      <b>Информация: </b><?php echo $movie['info']; ?>
    </li>
  </ul>

  <nav>
    <a href="index.php">На главную</a>
  </nav>

</body>
</html>
