<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <script>
    /*let p = new Promise(function(obe){
      setTimeout(function(){
        obe("bob");
      }, 5000);
    });
    
    console.log("start");
    p.then(function(text){
      console.log(text);
      return new Promise(function(bob){
        setTimeout(function(){
          bob("alex");
        }, 5000);
      });
    }).then(function(t){
      console.log(t);
    });
    console.log("finish");*/
    /*
    class Bob{
      constructor(f){
        f(this.alex, this.tod);
      }
      alex(){
        alert("hello");
      }
      tod(){
        alert("bye");
      }
    }
    
    let b = new Bob(function(a, b){
      b();
    });*/
    
     /*
  let p = fetch("main.php"); возвращает promise - выполняется с объектом встроенного класса Response в качестве результата, как только сервер пришлёт заголовки ответа.
  p.then(function(r){ // r = встроенный класс Response
    let p2 = r.text(); // читает ответ и возвращает promise
    p2.then(function(text){ text = текст ответа
      console.log(text);
    });
  });
  let prom = send("main.php?id=123");
  
  prom.then(function(result){
    console.log(result);
  });
  
  let prom2 = send("auth.php");
  prom2.then(function(result){
    alert(result);
  });

  async function send(url){
    let resource = await fetch(url); // ждем встроенный класс Response
    let text = await resource.text(); // ждем текст ответа
    return text;
  }*/
  
  let user = {
    name: "Alex",
    age: 100500
  }
  console.log(JSON.stringify(x));
  let btn = document.querySelector("button");
  btn.addEventListener("click", async function(){
    let obj = {
      method: "post",
      headers: {"Content-type": "application/json"},
      body: JSON.stringify(user) //преобразуем объект в JSON.
    };
    let resource = await fetch("test_obr.php", obj);
    let text = await resource.text();
    user = JSON.parse(text);
    console.dir(user);
  });
  
  
  </script>
</body>
</html>