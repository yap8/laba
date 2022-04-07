<?php
include_once('./partials/db.php');
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
    <div class="card">
      <img style="width: 10rem; margin: auto;" src="uploads/default.jpg">
      <div class="card-body">
        <h1 class="card-title text-center">Привет, <?php echo $user['name']; ?></h1>
      </div>
      <ul class="list-group list-group-flush">
        <?php if ($user['user_name'] || $user['user_surname']) { ?>
          <li class="list-group-item">
            <?php echo $user['user_name']; ?> <?php echo $user['user_surname']; ?>
          </li>
        <?php } ?>
        <li class="list-group-item">
          Статус: <?php echo $type['name']; ?>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <a class="btn btn-warning" href="update.php">Обновление</a>
        <a class="btn btn-primary" href="index.php">На главную</a>
        <a class="btn btn-danger" href="logout.php">Выйти</a>
      </div>
    </div>
  </div>

</body>

</html>
