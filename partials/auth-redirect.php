<?php
if (isset($_COOKIE['user_id'])) {
  $id = $_COOKIE['user_id'];

  $sql = "SELECT * FROM users WHERE id='$id';";

  $result = $conn->query($sql);

  $user = $result->fetch_all(MYSQLI_ASSOC)[0];

  if ($user) header('Location: data.php');
}
