<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reg</title> 
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
  include "header.php";
  ?>
  <div class="container">
    <form action="obr/reg_obr.php" method="post">
      <input type="email" name="email" placeholder="почта" required>
      <input type="password" name="pass" placeholder="пароль" required>
      <input type="password" name="pass2" placeholder="подтвердите пароль" required>
      <input type="text" name="name" placeholder="имя" required>
      <input type="text" name="surname" placeholder="фамилия" required>
      <input type="date" name="data" required>
      <input type="submit">
    </form>
   <script>
      let form = document.querySelector("form");
      form.addEventListener("submit", function(event){
        event.preventDefault();
        let formdata = new FormData(form);
        let xhr = new XMLHttpRequest();
        //let xhr = ajax();
        xhr.open(form.method, form.action); 
        xhr.onreadystatechange = function(){
          if(xhr.readyState == 4 && xhr.status == 200) {
            if(xhr.responseText == "OK"){
              alert("регистрация прошла успешно");
            } else {
              alert("такая почта занята");
            }
            console.log(xhr.responseText);
          }
        } 
        xhr.send(formdata); 
      });
    </script>
  </div>
  <?php
  include "footer.php";
  ?>
</body>
</html>