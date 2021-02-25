<?php
$file = $_FILES["foto"];
$path = $file["tmp_name"];// путь к файлу на сервере
$id = $_COOKIE["id"]; // 3

include "handler.php"; //имя файла делает новое с картинкой
$name = getNameFile($id, $file);

move_uploaded_file($path, "../avatars/$name"); //перемещаем файл

include "db.php";
$result = $dataBase->query("SELECT ava FROM user WHERE id = '$id'")->fetch_assoc()["ava"]; //запрашиваем из базы имя картинки
//получаем имя картинки из массива
if($name !== $result){ //если старое имя отличается от нового
  $dataBase->query("UPDATE user SET ava='$name' WHERE id = '$id'");//если старое имя отличается от нового
    if($result != "default.jpg"){ // если старое имя отличается от стандартного
    unlink("../avatars/$result"); // удалить старую картинку
    }
}
header("Location: ../lk.php");
?>