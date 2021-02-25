<?php
$id = $_COOKIE["id"];
include "obr/db.php";
$result = $dataBase->query("SELECT* FROM admin WHERE user_id=$id"); //проверяем может ли пользователь добавлять новость
$user = $result->fetch_assoc();
if($user == null){
  header("Location: main.php");
  exit();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include "header.php"?>
  <div class="container">
     <form action="obr/add_news_obr.php" method="post" enctype="multipart/form-data">
      Заголовок новости: <br>
      <textarea name="title" cols="30" rows="2" required></textarea> <br>
      Текст новости: <br>
      <textarea name="text" cols="30" rows="10" required></textarea> <br>
      <input type="file" name="img"> <br>
      <input type="submit" value="Добавить новость">
    </form>
  </div>
  <?php include "footer.php"?>
</body>
</html>