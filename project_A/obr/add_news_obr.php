<?php
$title = $_POST["title"];
$text = $_POST["text"];
$file = $_FILES["img"];
$id = $_COOKIE["id"];
$name = "default.jpg";
//print_r($img);
if($file["error"] == 0) {
  include "handler.php";
  $name = getName(time(), $file);// первый параметр id новости
  move_uploaded_file($file["tmp_name"], "../news/$name");
}

include "db.php";

$dataBase->query("INSERT INTO news (title, text, autor, img) VALUES ('$title', '$text', '$id', '$name')");

header("Location: ../add_news.php");


?>