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
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $reserved_name = $conn->query("SELECT name FROM users WHERE name='$name'");

  $reserved_name = $reserved_name->fetch_all(MYSQLI_ASSOC)[0];

  if (empty($reserved_name)) {
    $sql = "INSERT INTO users (name, password) VALUES ('$name', '$password');";

    $result = $conn->query($sql);

    $last_id = $conn->insert_id;

    setcookie('user_id', $last_id, time() + (86400 * 30));

    header('Location: data.php');
  } else {

    echo "Данный логин занят, попробуйте другой!!!";
  }
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
        <input class="form-control col col-sm-3 m-auto" type="password" placeholder="Password" name="password">
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