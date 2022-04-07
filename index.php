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
  
  <div class="container">
    <a class="btn btn-warning" href="data.php">Профиль</a>
    <a class="btn btn-danger" href="logout.php">Выйти</a>

    <?php if ($user['type_id'] == 2) { ?>
      <div class="row">
        <div class="col-6">
            <?php include_once('partials/movie-form.php'); ?>
        </div>
      </div>
    <?php } ?>

    <section>
      <h2>Фильмы</h2>
      <form class="form-inline mb-2" action="search.php" method="POST">
        <div class="form-group">
          <input class="form-control mr-2" type="text" name="title" placeholder="Название" value="<?php echo $_GET['query']; ?>">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" type="submit" name="submit">Найти</button>
        </div>
      </form>
      <table class="table">
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
              include('partials/admin-panel.php');
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
  </div>

</body>
</html>
