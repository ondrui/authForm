<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>regForm</title>
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css" media="all">
    .divF {
      height: 500px;
      width:  400px; 
    }
    body {
      background-color: blue;
    }
    input {
      box-sizing: border-box;
      width: 100%;
    }
  </style>
</head>
<body>
  <?php
  include "header.php";
  ?>
  <div class="divF">
    <h1>Форма регистрации</h1>
    <form action="obr/reg_obr.php" method="get">
        <label>Почта<input type="text" placeholder="Введите почту" name="email" required></label>
        <label>Пароль<input type="password" placeholder="Введите пароль" name="password" required></label>
        <label>Пароль<input type="password" placeholder="Введите пароль еще раз" name="password1" required></label>
        <label>Имя<input type="text" placeholder="Введите имя" name="name" required></label>
        <label>Фамилия<input type="text" placeholder="Введите фамилию" name="surname" required></label>
        <label>Дата рождения<input type="date" name="birthday" required></label>
        <input type="submit">
    </form>
  </div>
  <?php
  include "footer.php";
  ?>
</body>
</html>