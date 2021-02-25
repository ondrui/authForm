<?php
$login = $_POST['login'];
$password = $_POST['password'];
//подключаемся к базе
include "db.php";
//$dataBase = new mysqli("localhost", "ondrui_snow", "Admin111@", "ondrui_snow"); 
//отправляем строку запроса и получаем ответ
//Извлекает результирующий ряд в виде ассоциативного массива
$result = $dataBase->query("SELECT * FROM `user` WHERE `email`='$login'")->fetch_assoc();
//print_r($result);

if($password == $result['password']){
  setcookie("id", $result["id"], 0, "/php/project_A"); //устанавливает куки 
  header("Location: ../lk.php"); //перенаправление на личный кабинет
} else {
 echo "auth bad";
}
$dataBase->close();//Закрывает ранее открытое соединение с базой данных
?>