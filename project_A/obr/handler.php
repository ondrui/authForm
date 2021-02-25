<?php

function getName($first, $file){
  $name = $file["name"];//"bob.jpg" имя вайла
  $name = explode(".", $name); // ["bob", "jpg"];
  $name = array_pop($name); // "jpg";
  $name = "$first.$name"; // "3.jpg";
  return $name;
}

?>