<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>News</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .block{
      display: inline-block;
      width: 200px;
      margin: 5px 5px;
    }
    .block img{
      width: 100%;
    }
  </style>
</head>
<body>
  <?php
  include "header.php";
  ?>
  <div class="container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/x4YyWnuo9s0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
    <?php
    include "obr/db.php";
      $result = $dataBase->query("SELECT * FROM news ORDER BY date DESC LIMIT 3");
      while($news = $result->fetch_assoc()){
        $id = $news['id'];
        echo "<div class='block'>";
          echo "<div class='title'>
            <a href='show_news.php?id=$id'>".$news["title"]."</a>
          </div>";
          $name = $news['img'];
          echo "<img src='news/$name'>";
          echo "<div class='date'>".$news["date"]."</div>";
        echo "</div>";
    }
    ?>
  </div>
  <?php
  include "footer.php";
  ?>
</body>
</html>