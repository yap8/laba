<?php
include_once('./partials/db.php');
include_once('./partials/private.php');

$id = $_COOKIE['user_id'];

$result = $conn->query("SELECT * FROM users WHERE id='$id';");

$user = $result->fetch_all(MYSQLI_ASSOC)[0];

$sql = "SELECT * FROM movies";

if (isset($_GET['sort'])) {
  switch ($_GET['sort']) {
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

if (isset($_GET['ids'])) {
  if (!empty($_GET['ids'])) {
    $filteredMovies = [];

    $ids = explode(',', $_GET['ids']);

    foreach ($ids as $id) {
      foreach ($movies as $movie) {
        if ($movie['id'] === $id) {
          array_push($filteredMovies, $movie);
        }
      }
    }

    $movies = $filteredMovies;
  } else {
    $movies = [];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('partials/head.php'); ?>
  <title>Главная</title>
</head>

<body>

  <a class="btn btn-warning" href="data.php">Профиль</a>

  <?php
  if ($user['type_id'] == 2) {
    include_once('partials/add_new_movie.php');
  }
  ?>


  <section>
    <h2>Фильмы</h2>
    <form action="search.php" method="POST">
      <input type="text" name="title" placeholder="Название" value="<?php echo $_GET['query']; ?>">
      <button type="submit" name="submit">Найти</button>
    </form>
    <table>
      <tr>
        <th>Название</th>
        <th>Страна</th>
        <th>Год</th>
        <th>Статус</th>
      </tr>
      <?php foreach ($movies as $movie) : ?>
        <tr>
          <td><?php echo $movie['title']; ?></td>
          <td><?php echo $movie['country']; ?></td>
          <td><?php echo $movie['year']; ?></td>
          <td><?php echo $movie['status']; ?></td>
          <td><a href="info.php?id=<?php echo $movie['id']; ?>">Подробнее</a></td>
          <?php if ($user['type_id'] == 2) {
            include('partials/admin_panel.php');
          }
          ?>
        </tr>
      <?php endforeach ?>
    </table>
    <?php if (empty($movies)) echo 'ничего не найдено' ?>
  </section>

  <section>
    <h2>Сортировка</h2>
    <ul>
      <li><a href="?sort=asc">От старого к новому</a></li>
      <li><a href="?sort=desc">От нового к старому</a></li>
    </ul>
  </section>
  <a class="btn btn-danger" href="logout.php">Выйти</a>
</body>

</html>