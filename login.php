<?php
  include_once('db.php');

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name='$name' AND password='$password';";

    $result = $conn->query($sql);

    $user = $result->fetch_all(MYSQLI_ASSOC)[0];

    header('Location: data.php?id=' . $user['id']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вход</title>
</head>
<body>

  <form action="login.php" method="POST">
    <div>
      <input type="text" placeholder="Name" name="name">
    </div>
    <div>
      <input type="password" placeholder="Password" name="password">
    </div>
    <div>
      <button type="submit" name="submit">
        Войти
      </button>
    </div>
  </form>
  
</body>
</html>
