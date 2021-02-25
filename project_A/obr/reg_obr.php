<?php
$email = $_GET['email'];
$password = $_GET['password'];
$password1 = $_GET['password1'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$birthday = $_GET['birthday'];

if($password == $password1) {
  echo "Поздравляем, $name  вы успешно зарегистрировались <br>";
  print_r($_GET);
} else {
  echo "$name, проверьте пароли, они не совпадают <br>";
  print_r($_GET);
  exit("<script>window.location.href = '../formReg.php'</script>");
}
//$dataBase = new mysqli("localhost", "ondrui_snow", "Admin111@", "ondrui_snow"); 
include "db.php";
 
$result = $dataBase->query("INSERT INTO user(name, surname, email, password, birthday) VALUES ('$name', '$surname', '$email', '$password', '$birthday')");

if($result){
  //echo "Регистрация прошла успешно";  
  header("Location: ../lk.php");
} else {
  echo "You are fired";
  header("Location: exit.php");
}
$dataBase->close();//Закрывает ранее открытое соединение с базой данных
?>