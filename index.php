<?php
  $conn = new mysqli('localhost', 'root', '', 'movies');

  $sql = "SELECT * FROM movies";

  if (isset($_GET['sort'])) {
    switch($_GET['sort']) {
      case 'asc':
        $sql = "SELECT * FROM movies ORDER BY year ASC;";
        break;
      case 'desc':
        $sql = "SELECT * FROM movies ORDER BY year DESC;";
        break;
    }
  }

  $result = $conn->query($sql);

  $movies = $result->fetch_all(MYSQLI_ASSOC);
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

  <table>
    <tr>
      <th>Название</th>
      <th>Страна</th>
      <th>Год</th>
    </tr>
    <?php foreach($movies as $movie): ?>
      <tr>
        <td><?php echo $movie['title']; ?></td>
        <td><?php echo $movie['country']; ?></td>
        <td><?php echo $movie['year']; ?></td>
        <td><a href="info.php?id=<?php echo $movie['id']; ?>">Подробнее</a></td>
      </tr>
    <?php endforeach ?>
  </table>

  <h4>Сортировка</h4>
  <ul>
    <li><a href="?sort=asc">От старого к новому</a></li>
    <li><a href="?sort=desc">От нового к старому</a></li>
  </ul>

</body>
</html>
