<?php
$db = new mysqli("localhost", "ondrui_snow", "Admin111@", "ondrui_snow"); 
class User{
  //авторизация
  static public function getUser($email, $pass){
    global $db;
    $result = $db->query("SELECT * FROM user WHERE email='$email' AND password = '$pass'");
    $user = $result->fetch_assoc();
    return $user;
  }
  //регистрация нового пользователя
  static public function regUser($name, $surname, $email, $password, $birthday){
    global $db;
    $result = $db->query("INSERT INTO user (name, surname, email, password, birthday) VALUES ('$name', '$surname', '$email', '$password', '$birthday')");
    print_r($result);
    return $result;
  }
}


