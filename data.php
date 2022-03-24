<?php
  include_once('db.php');

  $id = $_GET['id'];

  $sql = "SELECT * FROM users WHERE id='$id';";

  $result = $conn->query($sql);
  
  $user = $result->fetch_all(MYSQLI_ASSOC)[0];

  if (!$user) header('Location: login.php');

  $type_id = $user['type_id'];

  $sql = "SELECT * FROM types WHERE id='$type_id';";

  $result = $conn->query($sql);

  $type = $result->fetch_all(MYSQLI_ASSOC)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Привет</title>
</head>
<body>

  <h1>Привет, <?php echo $user['name']; ?></h1>
  <div>Статус: <?php echo $type['name']; ?></div>

</body>
</html>
