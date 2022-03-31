<?php
  include_once('./partials/db.php');
  include_once('./partials/private.php');

  if (isset($_POST['submit'])) {
    $user_id = $_COOKIE['user_id'];
    $user_name = $_POST['user-name'];
    $user_surname = $_POST['user-surname'];

    $sql = "UPDATE users SET user_name='$user_name', user_surname='$user_surname' WHERE id='$user_id';";

    $result = $conn->query($sql);

    header('Location: data.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('partials/head.php'); ?>
  <title>Обновить данные пользователя</title>
</head>
<body>

  <div class="container">
    <h1 class="text-center">Обновить пользовательские данные</h1>
  </div>

  <div class="container mt-4">
    <form action="update.php" method="POST">
      <div class="form-group row">
        <input class="form-control col-sm-3 m-auto" type="text" placeholder="Имя" name="user-name">
      </div>
      <div class="form-group row">
        <input class="form-control col-sm-3 m-auto" type="text" placeholder="Фамилия" name="user-surname">
      </div>
      <div class="form-group row">
        <button class="btn btn-primary col-sm-3 m-auto" type="submit" name="submit">
          Обновить
        </button>
      </div>
    </form>
  </div>
  
</body>
</html>
