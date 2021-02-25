<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
  include "header.php";
  echo "<div class='container'>";
  $id = $_COOKIE["id"];
  if($id == null){
    echo ("<a href='auth.php'>необходимо авторизоваться</a>");
  } else {
    $dataBase = new mysqli("localhost", "h964777t_bd", "Admin1!", "h964777t_bd");
    
    $result = $dataBase->query("SELECT * FROM user WHERE id=$id");
    $user = $result->fetch_assoc();
    if($user){
      $name = $user['name'];
      $surname = $user['surname'];
      $birthday = $user['birthday'];
      $email = $user['email'];
      
      echo "<p><b>Имя:</b> $name </p>";
      echo "<form action='update_obr.php' method='post'>
        <input type='text' name='column' value='name' hidden>
        Изменить имя: <input type='text' name='name'>
        <input type='submit'>
      </form>";
      echo "<p><b>Фамилия:</b> $surname </p>";
      echo "<form action='update_obr.php' method='post'>
        <input type='text' name='column' value='surname' hidden>
        Изменить фамилию: <input type='text' name='value'>
        <input type='submit'>
      </form>";
      echo "<p><b>Дата рождения:</b> $birthday </p>";
      echo "<form action='update_obr.php' method='post'>
        <input type='text' name='column' value='birthday' hidden>
        Изменить дату: <input type='date' name='value'>
        <input type='submit'>
      </form>";
      echo "<p><b>Почта:</b> $email </p>";
      echo "<form action='update_obr.php' method='post'>
        <input type='text' name='column' value='email' hidden>
        Изменить почту: <input type='email' name='value'>
        <input type='submit'>
      </form>";
    }
  }
  echo "</div>";
  include "footer.php";
?>


</body>
</html>