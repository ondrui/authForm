<?php
$str = file_get_contents("php://input");
$user = json_decode($str);
$user->age = 22;
$str = json_encode($user);
echo $str;
?>