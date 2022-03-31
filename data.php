<?php
  include_once('db.php');
  include_once('./partials/private.php');

  $id = $_COOKIE['user_id'];

  $sql = "SELECT * FROM users WHERE id='$id';";

  $result = $conn->query($sql);
  
  $user = $result->fetch_all(MYSQLI_ASSOC)[0];

  if (!$user) return header('Location: login.php');

  $type_id = $user['type_id'];

  $sql = "SELECT * FROM types WHERE id='$type_id';";

  $result = $conn->query($sql);

  $type = $result->fetch_all(MYSQLI_ASSOC)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('partials/head.php'); ?>
  <title>Привет</title>
</head>
<body>

  <div class="container mt-4 mb-4">
    <div class="row">
      <h1 class="col text-center">Привет, <?php echo $user['name']; ?></h1>
    </div>
    <div class="row">
      <div class="col text-center">
        <ul>
          <?php if ($user['user_name'] || $user['user_surname']) { ?>
            <li><?php echo $user['user_name']; ?> <?php echo $user['user_surname']; ?></li>
          <?php } ?>
          <li>Статус: <?php echo $type['name']; ?></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <a class="btn btn-danger" href="logout.php">Выйти</a>
        <a class="btn btn-warning" href="update.php">Обновление</a>
      </div>
    </div>
  </div>

</body>
</html>
