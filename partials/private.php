<?php

if (!$_COOKIE['user_id']) {
  header('Location: login.php');
}
