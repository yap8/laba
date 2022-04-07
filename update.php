<?php
include_once('./partials/db.php');
include_once('./partials/private.php');

$user_id = $_COOKIE['user_id'];

if (isset($_POST['submit'])) {
  $user_name = $_POST['user-name'];
  $user_surname = $_POST['user-surname'];
  $user_avatar = $_POST['avatar'];

  $tmp_name = $_FILES['avatar']['tmp_name'];
  $file_type = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
  $name = 'uploads/' . uniqid() . '.' . $file_type;

  if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" ) {
    return header('Location: update.php');
  }

  move_uploaded_file($_FILES["avatar"]["tmp_name"], $name);

  $sql = "UPDATE users SET user_name='$user_name', user_surname='$user_surname', avatar='$name' WHERE id='$user_id';";

  $result = $conn->query($sql);

  header('Location: data.php');
}

$sql = "SELECT * FROM users WHERE id='$user_id';";

$result = $conn->query($sql);

$user = $result->fetch_all(MYSQLI_ASSOC)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('partials/head.php'); ?>
  <title>Обновить данные пользователя</title>
</head>

<body>

  <div class="container mt-4">
    <h1 class="text-center">Обновить пользовательские данные</h1>
  </div>

  <div class="container mt-4">
    <form action="update.php" method="POST" enctype="multipart/form-data">
      <div class="form-group row">
        <div class="col col-sm-3 m-auto">
          <label>
            <img style="width: 10rem; margin: auto; cursor: pointer;" src="<?php echo $user['avatar']; ?>">
            <input type="file" class="form-control-file" name="avatar">
          </label>
        </div>
      </div>
      <div class="form-group row">
        <input class="form-control col-sm-3 m-auto" type="text" placeholder="Имя" name="user-name" value="<?php echo $user['user_name']; ?>">
      </div>
      <div class="form-group row">
        <input class="form-control col-sm-3 m-auto" type="text" placeholder="Фамилия" name="user-surname" value="<?php echo $user['user_surname']; ?>">
      </div>
      <div class="form-group row">
        <button class="btn btn-primary col-sm-3 m-auto" type="submit" name="submit">
          Обновить
        </button>
      </div>
    </form>
    <a class="btn btn-warning" href="data.php">Профиль</a>
  </div>

</body>

</html>
