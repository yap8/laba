<?php
include_once('db.php');

if (isset($_COOKIE['user_id'])) {
  $id = $_COOKIE['user_id'];

  $sql = "SELECT * FROM users WHERE id='$id';";

  $result = $conn->query($sql);

  $user = $result->fetch_all(MYSQLI_ASSOC)[0];

  if ($user) header('Location: data.php');
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE name='$name' AND password='$password';";

  $result = $conn->query($sql);

  $user = $result->fetch_all(MYSQLI_ASSOC)[0];

  setcookie('user_id', $user['id'], time() + (86400 * 30));

  header('Location: data.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('partials/head.php'); ?>
  <title>Вход</title>
</head>

<body>

  <div class="container mt-4">
    <form action="login.php" method="POST">
      <div class="form-group row">
        <input class="form-control col-sm-3 m-auto" type="text" placeholder="Name" name="name">
      </div>
      <div class="form-group row">
        <input class="form-control col-sm-3 m-auto" type="password" placeholder="Password" name="password">
      </div>
      <div class="form-group row">
        <button class="btn btn-primary col-sm-3 m-auto" type="submit" name="submit">
          Войти
        </button>
      </div>
    </form>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-3 m-auto">
        Нет аккаунта? <a href="register.php">Регистрация</a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3 m-auto">
        <a href="index.php">На главную</a>
      </div>
    </div>
  </div>

</body>

</html>