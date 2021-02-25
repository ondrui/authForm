<header>
  <a href="main" class="logo">
    <img src="http://ondrui.beget.tech/php/project_A/bender.jpg" height="100%" width="150px">
  </a>
  <nav>
    <?php
    $menuList = ["новости"=>'news'];// для хранения ссылок
    if($_COOKIE["id"] == null){ // если неавторизованны
      $menuList["вход"] = "auth";
      $menuList["регистрация"] = "reg";
    } else {
      $menuList["личный кабинет"] = "lk";
      $menuList["выход"] = "exit";
    }
    
    foreach($menuList as $key => $value){
      if($value == $uri){
        continue;
      }
      echo "<a href='http://ondrui.beget.tech/php/project_C/$value'>$key</a> ";
    }
    ?>
  </nav>
</header>