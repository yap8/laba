<?php
  include_once('db.php');

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
  <title>Главная</title>
</head>
<body>

  <section>
    <h2>Добавить новый фильм:</h2>
    <form action="add.php" method="POST">
      <div>
        <input type="text" name="title" placeholder="название">
      </div>
      <div>
        <select name="country">
          <?php $countries = json_decode(file_get_contents('countries.json'), true); ?>
          <?php foreach ($countries as $country) { ?>
            <option><?php echo $country['name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div>
        <input type="number" name="year" min="1900" max="2022" value="2022">
      </div>
      <div>
        <textarea name="info" placeholder="информация"></textarea>
      </div>
      <div>
        <button type="submit" name="add">Отправить</button>
      </div>
    </form>
  </section>

  <section>
    <h2>Фильмы</h2>
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
          <td><a href="edit.php?id=<?php echo $movie['id']; ?>">Редактировать</a></td>
          <td><a href="delete.php?id=<?php echo $movie['id']; ?>">Удалить</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </section>

  <section>
    <h2>Сортировка</h2>
    <ul>
      <li><a href="?sort=asc">От старого к новому</a></li>
      <li><a href="?sort=desc">От нового к старому</a></li>
    </ul>
  </section>

</body>
</html>
