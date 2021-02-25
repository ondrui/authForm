<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<link rel="stylesheet" href="css/style.css">
<style>
  img {
    width: 100%;
    height: auto;
  }
  .block {
    width: 90%;
    border: 2px solid black;
    margin: 5px auto;
  }
</style>
<body>
<?php
include "header.php";
$id = $_GET["id"];
include "obr/db.php";
$result = $dataBase->query("SELECT * FROM news 
JOIN user ON news.autor = user.id WHERE news.id=$id
");
$news = $result->fetch_assoc();
echo "<div class='block'>";
echo "<div class='title'><h2>".$news["title"]."</h2></div>";
$name = $news['img'];
echo "<img src='news/$name'>";
echo "<div class='text'>".$news["text"]."</div>";
echo "<hr>";
echo "<div class='autor'>".$news["name"]." ".$news["surname"]."</div>";
echo "<hr>";
echo "<div class='date'>".$news["date"]."</div>";
echo "</div>";
?>
<?php
include "footer.php";
?>
</body>
</html>