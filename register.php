<?php
  include_once('db.php');

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO users (name, password) VALUES ('$name', '$password');";
  
    $result = $conn->query($sql);

    $last_id = $conn->insert_id;

    header('Location: data.php?id=' . $last_id);
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
