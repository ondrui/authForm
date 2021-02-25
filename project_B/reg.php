<?php
$title = "Регистрация";
include("header.php");
?>
  <div class="container">
    <form action="obr/reg_obr.php" method="post">
      <input type="email" name="email" placeholder="почта" required>
      <input type="password" name="pass" placeholder="пароль" required>
      <input type="password" name="pass2" placeholder="подтвердите пароль" required>
      <input type="text" name="name" placeholder="имя" required>
      <input type="text" name="surname" placeholder="фамилия" required>
      <input type="date" name="birthday" required>
      <input type="submit">
    </form>
    
    <script>
      let form = document.querySelector("form");
      form.addEventListener("submit", function(event){
        event.preventDefault();
        let formdata = new FormData(form);
        
        let obj = {
          method: "post",
          body: formdata
        }
        let promise = send(form.action, obj);
        promise.then(obr);
      });
      
      function obr(text){
        switch(text){
          case "OK":
            window.location.href="auth.php";
            break;
          case "CANCEL":
            alert("Почта занята");
            break;
          case "pass":
            alert("Пароли несовпадают");
        }
      }
      
      async function send(url, option){
        let resurce = await fetch(url, option);
        let text = await resurce.text();
        return text;
        /*if(text == "OK"){
          window.location.href = 'auth.php';
        } else if(text == "pass") {
          alert("проверьте пароли");
        } else {
          alert("такая почта занята");
        }*/
      }
    </script>
  </div>
  <?php
  include("footer.php");
  ?>
</body>
</html>