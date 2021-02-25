<?php
session_start();
$file = $_FILES["foto"];
$path = $file["tmp_name"];// путь к файлу на сервере
$id = $_SESSION["user"]["id"]; // 3

include "handler.php";
$name = getNameFile($id, $file);

move_uploaded_file($path, "../avatars/$name"); //перемещает файл

$oldName = $_SESSION["user"]["ava"];
if($oldName != $name){ //если старое имя отличается от нового
  $dataBase = new mysqli("localhost", "ondrui_snow", "Admin111@", "ondrui_snow");
  $dataBase->query("UPDATE user SET ava='$name' WHERE id=$id"); //записать в базу новое имя
  $_SESSION["user"]["ava"] = $name;
  if($oldName != "default.jpg"){ // если старое имя отличается от стандартного
    unlink("../avatars/$oldName"); // удалить старую картинку
  }
}
echo "OK";
?>