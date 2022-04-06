<?php
include_once('./partials/db.php');
include_once('./partials/auth-redirect.php');

switch (isset($_GET['err'])) {
  case 'no_user':
    echo 'Нет пользователя или имя введено неверно';
    break;
  case 'password':
    echo 'Неверный пароль';
    break;
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE name='$name';";

  $result = $conn->query($sql);

  $user = $result->fetch_all(MYSQLI_ASSOC)[0];

  if (!$user) return header('Location: login.php?err=no_user');
  if (!password_verify($password, $user["password"])) return header('Location: login.php?err=password');

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