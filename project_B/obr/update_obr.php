<?php
session_start();
$user = $_SESSION["user"];
$column = $_POST['column'];
$value = $_POST['value'];
$id = $user["id"];
$dataBase = new mysqli("localhost", "ondrui_snow", "Admin111@", "ondrui_snow");
$result = $dataBase->query("UPDATE user SET $column='$value' WHERE id=$id");
if($result){
    /*
  $user[$column] = $value;
  $_SESSION["user"] = $user;
  */
  $_SESSION["user"][$column] = $value;
  echo "OK";
} else {
  echo "CANCEL";
}