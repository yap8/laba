<?php
include_once('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM movies WHERE id=$id;";

$conn->query($sql);

header('Location: index.php');
