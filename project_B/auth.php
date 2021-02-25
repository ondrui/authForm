<?php
$title = "Авторизация";
include "header.php";
?>
<div class="container">
  <form action="obr/auth_obr.php" method="post">
    <input type="text" placeholder="почта" name="email" required>
    <input type="password" placeholder="пароль" name="pass" required>
    <input type="submit">
  </form>
  
 <script>
    let form = document.querySelector("form");
    form.addEventListener("submit", function(event){
      event.preventDefault();
      /*
      let email = form.children[0];
      let pass = form.children[1];
      let query = email.name+"="+email.value+"&"+pass.name+"="+pass.value;*/
      let formdata = new FormData(form);
      let xhr = ajax();
      xhr.open(form.method, form.action); // подготавливаем объект
      //xhr.setRequestHeader('Content-Type', "application/x-www-form-urlencoded"); //устанавливаем заголовки
      xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200) {
          if(xhr.responseText == "OK"){
            window.location.href = "lk.php";
          } else {
            alert("логин или пароль неверный");
          }
        }
      } // обработчик, когда приходит ответ, запускается обработчик
      xhr.send(formdata); // отправляем ассинхронный запрос
    });
    //https://www.kobzarev.com/programming/xmlhttprequest-description-application-frequent-problems/#ispolzovanie-xmlhttprequest
    function ajax(){
      let xmlhttp;
      try { //пытаемся выполнить код
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); //встроенный объект в браузер
      } catch (e) { // обрабатываем ошибку
        try {//пытаемся выполнить код
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //встроенный объект в браузер
        } catch (E) {// обрабатываем ошибку
          xmlhttp = false;
        }
      }
      if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();//встроенный объект в браузер
      }
      return xmlhttp;
    }
    

  </script>
  
</div>
<?php
include "footer.php";
?>
</body>
</html>