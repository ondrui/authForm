<?php
session_start();
$user = $_SESSION["user"];
if($user == null){
  header("Location: auth.php");
  exit();
}
$title = "личный кабинет";
include "header.php"?>
  <div class="container">
    <div class="left">
     <label for="kartinka">
        <img src="avatars/<?=$user["ava"]."?".time()?>" title="загрузить аватарку">
        <br>загрузить аватарку
      </label>
      <form action="obr/ava_obr.php" method="post" enctype="multipart/form-data">
        <input type="file" id="kartinka" hidden name="foto" required>
      </form>
    </div>
    <div class="right">
      <?php
      $text = [
        "name"=>"Имя",
        "surname"=>"Фамилия",
        "birthday"=>"Дата рождения",
        "email"=>"Почта",
      ]; // адаптер
      $typeList = [
        "name"=>"text",
        "surname"=>"text",
        "birthday"=>"date",
        "email"=>"email",
      ];// адаптер
      unset($user["id"]);
      unset($user["password"]);
      unset($user["ava"]);
      unset($user["gender"]);
      foreach($user as $key => $value):
        $t = $text[$key];
        $type = $typeList[$key];
        //if($key == "birthday") $value = date("d-m-Y", strtotime($value));
       ?>
      <p><b><?=$t?>:</b> <span id='<?=$key?>'><?=$value?></span> </p>
      <form class="update" action='obr/update_obr.php' method='post'>
        <input type='text' name='column' value='<?=$key?>' hidden>
        <?=$t?> изменить : <input type='<?=$type?>' name='value'>
        <input type='submit'>
      </form>
      <?php endforeach ?>
    </div>
    <script>
     let right = document.querySelector(".right");
      right.addEventListener("submit", async function(event){
        event.preventDefault();
        let form = event.target;
        let formdata = new FormData(form);
        let obj = {
          method: "post",
          body: formdata
        }
        //await используется только в ассинхронной функции
        //добавляем await что бы получить результат промиса
        let t = await send(form.action, obj);
        if(t == "OK"){
          let value = form[1].value;
          form[1].value = "";
          document.querySelector("#"+form[0].value).innerHTML = value;
          
        } else {
          console.log(t);
        }
      });
      
      async function send(url, option){
        let resurce = await fetch(url, option);
        let text = await resurce.text();
        //console.log(text);
        return text;
      }
      /*let forms = document.querySelectorAll(".update");
      for(let form of forms){
        form.addEventListener("submit", function(event){
          event.preventDefault();
          let formdata = new FormData(form);
        
          let obj = {
            method: "post",
            body: formdata
          }
          send(form.action, obj);
          //console.log(form);
        });
      }*/
      
      let input = document.querySelector("#kartinka");
      input.addEventListener("change", async function(){
        let file = input.files[0];
        let form = input.parentElement;
        let formdata = new FormData(form);
        let obj = {
          method: "post",
          body: formdata
        }
        //await используется только в ассинхронной функции
        //добавляем await что бы получить результат промиса
        let t = await send(form.action, obj);
        if(t == "OK"){
          let img = form.previousElementSibling.firstElementChild;
          img.src = URL.createObjectURL(file);
        } else {
          console.log(t);
        }
      });
    </script>
    <style>
      .container{
        display: flex;
      }
      .left img{
        width: 100px;
        height: 100px;
      }
      .left label{
        cursor: pointer;
      }
      .right{
        margin-left: 10px;
      }
    </style>
  </div>
  <?php include "footer.php"?>
</body>
</html>