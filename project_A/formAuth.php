<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>regForm</title>
  <!--<style type="text/css" media="all">
    .divF {
      height: 500px;
      width:  400px; 
    }
    input {
      box-sizing: border-box;
      width: 100%;
    }
  </style>-->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
  include "header.php";
  ?>
  <div class="container">
    <h1>авторизация</h1>
    <form action="obr/auth_obr.php" method="post">
        <input type="text" placeholder="почта" name="login" required>
        <input type="password" placeholder="пароль" name="password" required>
        <input type="submit">
    </form>
  </div>
  <?php
  include "footer.php";
  ?>
</body>
</html>