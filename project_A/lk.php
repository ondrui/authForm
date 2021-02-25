<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .container{
      display: flex;
    }
    .left img{
      width: 100px;
    }
    .right{
      margin-left: 10px;
    }
  </style>
</head>
<body>
<?php
 include "header.php";
 $id = $_COOKIE['id'];
 if (!isset($_COOKIE['id'])) {
    exit("<script>window.location.href = 'formAuth.php'</script>");
    //echo ("<a href='auth.php'>необходимо авторизоваться</a>");
  } else {
  include "obr/db.php";
  $result = $dataBase->query("SELECT name, surname, birthday, email, ava, admin.user_id as access
FROM user
LEFT JOIN admin
  ON admin.user_id = user.id
WHERE id=$id")->fetch_assoc();
  }
  $access = $result["access"];
?>
<div class="container">
  <div class="left">
    <label for="kartinka">
     <img src="avatars/<?=$result['ava']."?".time()?>" title="загрузить аватарку"> <!--?= короткая запись php echo-->
     <br>
      загрузить аватарку
    </label>
    <form action="obr/ava_obr.php" method="post" enctype="multipart/form-data">
      <input type="file" id="kartinka" hidden name="foto" required>
      <input type="submit" value="загрузить аватарку">
    </form>
  </div>
  <div class="right">
    <ul>
      <li>
        Имя - <span><?php echo $result['name'] ?></span>
        <form action='obr/update_obr.php' method='post'>
         <!-- <input type='text' name='column' value='name' hidden>-->
          Изменить имя: <input type='text' name='name'>
          <input type='submit'>
        </form>
      </li>
      <li>
        Фамилия - <span><?php echo $result['surname'] ?></span>
        <form action='obr/update_obr.php' method='post'>
          <!--<input type='text' name='column' value='surname' hidden>-->
          Изменить фамилию: <input type='text' name='surname'>
          <input type='submit'>
        </form>
      </li>
      <li>
        Почта - <span><?php echo $result['email'] ?></span>
        <form action='obr/update_obr.php' method='post'>
          <!--<input type='text' name='column' value='email' hidden>-->
          Изменить почту: <input type='email' name='email'>
          <input type='submit'>
        </form>
      </li>
      <li>
        Дата рождения -<span><?php echo $result['birthday'] ?></span>
        <form action='obr/update_obr.php' method='post'>
        <!-- <input type='text' name='column' value='birthday' hidden>-->
          Изменить дату: <input type='date' name='birthday'>
          <input type='submit'>  
        </form>
      </li>
    </ul>
  </div>
  <?php
if($access != null){
  echo "<a href='add_news.php'>Добавить новость</a>";
}
?>
</div>
<?php
include "footer.php";
?>
</body>
</html>
