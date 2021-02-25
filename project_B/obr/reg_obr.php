<?php
$email = $_POST['email'];
$password = $_POST['pass'];
$password1 = $_POST['pass2'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$birthday = $_POST['birthday'];
//print_r($_POST);

if($password != $password1||empty($password)){
  exit("pass");
}
$dataBase = new mysqli("localhost", "ondrui_snow", "Admin111@", "ondrui_snow");   
$result = $dataBase->query("INSERT INTO user(name, surname, email, password, birthday) VALUES ('$name', '$surname', '$email', '$password', '$birthday')"); 

if($result){
  echo "OK";//выводится в консоль, пользователь не видит
} else {
  echo "CANCEL";
}
