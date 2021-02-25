<?php
$key = implode(array_keys($_POST));//получаем ключ
$value = implode($_POST);//получаем значение

include "db.php";
$id = $_COOKIE['id'];
$result = $dataBase->query("UPDATE user SET $key = '$value' WHERE id=$id");
header("Location: ../lk.php");
?>