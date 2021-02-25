<?php
if($user == null){
  include("view/main.php");
}else{ ?>

<div class="left"></div>
<div class="rigt">
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
  
foreach($user as $key => $value){
  $t = $text[$key];
  $type = $typeList[$key];
  echo "<p><b>$t:</b> $value </p>";
  echo "<form action='obr/update_obr.php' method='post'>
    <input type='text' name='column' value='$key' hidden>
    $t изменить : <input type='$type' name='value'>
    <input type='submit'>
  </form>";
}
?>
  
  
</div>

<?php
} 