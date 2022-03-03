<?php
  include_once('db.php');

  $id = $_GET['id'];

  if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $country = $_POST['country'];
    $year = $_POST['year'];
    $info = $_POST['info'];

    $sql = "UPDATE movies SET title = '$title', country = '$country', year = '$year', info = '$info' WHERE id = '$id'";

    $conn->query($sql);

    header('Location: index.php');
  }

  $sql = "SELECT * FROM movies WHERE id = $id";

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
  <title>Редактировать</title>
</head>
<body>

  <h1>Редактировать <?php echo $movie['title']; ?></h1>

  <section>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
      <div>
        <label>
          Название
          <input type="text" name="title" value="<?php echo $movie['title']; ?>">
        </label>
      </div>
      <div>
        <label>
          Страна
          <input type="text" name="country" value="<?php echo $movie['country']; ?>">
        </label>
      </div>
      <div>
        <label>
          Год
          <input type="number" name="year" min="1900" max="2022" value="<?php echo $movie['year']; ?>">
        </label>
      </div>
      <div>
        <label>
          <div>Информация</div>
          <textarea name="info"><?php echo $movie['info']; ?></textarea>
        </label>
      </div>
      <div>
        <button type="submit" name="edit">Отправить</button>
      </div>
    </form>
  </section>

  <nav style="padding-top: 12px;">
    <a href="index.php">На главную</a>
  </nav>

</body>
</html>
