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
    <div class="card mb-3" style="width: 32rem;">
      <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_180031402d1%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_180031402d1%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1937484741211%22%20y%3D%2296.24000034332275%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
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
