<?php
include_once('db.php');
include_once('./partials/auth-redirect.php');

switch ($_GET['err']) {
  case 'password':
    echo 'Пароли не совпадают';
    break;
  case 'name':
    echo 'Пользователь уже существует';
    break;
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];

  if ($_POST['password1'] !== $_POST['password2']) return header('Location: register.php?err=password');

  $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);

  $reserved_name = $conn->query("SELECT name FROM users WHERE name='$name'");

  $reserved_name = $reserved_name->fetch_all(MYSQLI_ASSOC)[0];

  if (!empty($reserved_name)) return header('Location: register.php?err=name');

  $sql = "INSERT INTO users (name, password) VALUES ('$name', '$password');";

  $result = $conn->query($sql);

  header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('partials/head.php'); ?>
  <title>Регистрация</title>
</head>

<body>

  <div class="container mt-4">
    <form action="register.php" method="POST">
      <div class="form-group row">
        <input class="form-control col col-sm-3 m-auto" type="text" placeholder="Name" name="name">
      </div>
      <div class="form-group row">
        <input class="form-control col col-sm-3 m-auto" type="password" placeholder="Password" name="password1">
      </div>
      <div class="form-group row">
        <input class="form-control col col-sm-3 m-auto" type="password" placeholder="Repeat password" name="password2">
      </div>
      <div class="form-group row">
        <button class="btn btn-primary col col-sm-3 m-auto" type="submit" name="submit">Зарегистрироваться</button>
      </div>
    </form>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-3 m-auto">
        Есть аккаунт? <a href="login.php">Вход</a>
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
