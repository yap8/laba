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
  <?php include_once('partials/head.php'); ?>
  <title>Привет</title>
</head>
<body>

  <div class="container mt-4">
    <div class="row">
      <h1 class="col text-center">Привет, <?php echo $user['name']; ?></h1>
    </div>
    <div class="row">
      <div class="col text-center">Статус: <?php echo $type['name']; ?></div>
    </div>
  </div>

</body>
</html>
