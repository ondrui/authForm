<?php
session_start();
$user = $_SESSION["user"];
$uri = $_SERVER["REQUEST_URI"]; // "/php/project_C/main.php";
$uri = explode("/", $uri); //['', 'php', 'project_C', 'main.php']
$uri = array_pop($uri); // 'main.php' 
// 
include "model/user.php";

$methodList = [
  "regUser" => function() {
    //print_r($_POST);
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password1 = $_POST['pass2'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];
    if($password != $password1 || $password == null){
      return "reg";
    }
    $result = User::regUser($name, $surname, $email, $password, $birthday);
   if($result){
      return "auth";
    } else {
      return "reg";
    }
  },
  "getUser" => function() {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $user = User::getUser($email, $pass);
    if($user) {
      $_SESSION["user"] = $user;
      return "lk";
    } else {
      return "auth";
    }
  }
];

$method = $methodList[$uri];
if($method){
  $uri = $method();
}
$pageList = [
  "main" => "view/main.php",
  "auth" => "view/auth.php",
  "reg" => "view/reg.php",
  "lk" => "view/lk.php"
]; // список страниц

$page = $pageList[$uri]; // получаем путь к странице если есть
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include "view/header.php"?>
  <div class="container">
    <?php
      if($page){
        include $page;
      } else {
        include "404.php";
      }
    ?>
  </div>
  <?php include "view/footer.php"?>
</body>
</html>


