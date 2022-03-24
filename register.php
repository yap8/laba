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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Регистрация</title>
</head>
<body>

  <form action="register.php" method="POST">
    <div>
      <input type="text" placeholder="Name" name="name">
    </div>
    <div>
      <input type="password" placeholder="Password" name="password">
    </div>
    <div>
      <button type="submit" name="submit">Зарегистрироваться</button>
    </div>
  </form>
  
</body>
</html>
