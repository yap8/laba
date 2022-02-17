<?php
  $conn = new mysqli('localhost', 'root', '', 'movies');

  $id = $_GET['id'];

  $sql = "SELECT * FROM movies WHERE id=$id LIMIT 1";

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
  <title>Document</title>
</head>
<body>

  <h1><?php echo $movie['title']; ?></h1>
  <ul>
    <li><?php echo $movie['country']; ?></li>
    <li><?php echo $movie['year']; ?></li>
    <li><?php echo $movie['info']; ?></li>
  </ul>
  
</body>
</html>
