<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <script>
    let p = new Promise(function(a, b){
      //a("bob");
      setTimeout(function())
    });
    console.log("start");
    p.then(function(text){
      console.log(text);
    });
    console.log("start");
  </script>
</body>
</html>