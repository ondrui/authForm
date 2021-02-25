<?php
$email = $_POST["email"];
$pass = $_POST["pass"];
$dataBase = new mysqli("localhost", "ondrui_snow", "Admin111@", "ondrui_snow"); 
$result = $dataBase->query("SELECT * FROM user WHERE email='$email' AND password='$pass'");
$user = $result->fetch_assoc();
if($user){
  session_start(); // Стартует новую сессию, либо возобновляет существующую
  $_SESSION["user"] = $user; // добавляем массив с информацией о пользователе в сессию
  echo "OK";
} else {
  echo "CANCEL";
}
?>