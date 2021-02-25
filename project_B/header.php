<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$title?></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <a href="http://ondrui.beget.tech/php/project_B/main.php" class="logo">
    <img src="http://ondrui.beget.tech/php/project_B/bender.jpg" height="100%" width="150px">
  </a>
  <nav>
    <?php
    $menuList = ["новости"=>'news.php'];// для хранения ссылок
    if($_SESSION["user"] == null){ // если неавторизованны
      $menuList["вход"] = "auth.php";
      $menuList["регистрация"] = "reg.php";
    } else {
      $menuList["личный кабинет"] = "lk.php";
      $menuList["выход"] = "obr/exit.php";
    }
    //$uri = array_pop(explode("/", $_SERVER["REQUEST_URI"]));
    
    $uri = $_SERVER["REQUEST_URI"]; // "/1275/projectA/main.php";
    $uri = explode("/", $uri);// ["", "1275", "projectA", "main.php"];
    $uri = array_pop($uri); // "main.php";
    
    foreach($menuList as $key => $value){
      if($value == $uri){
        continue;
      }
      echo "<a href='http://ondrui.beget.tech/php/project_B/$value'>$key</a> ";
    }
    ?>
  </nav>
</header>