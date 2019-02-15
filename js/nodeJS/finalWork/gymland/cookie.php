<?php session_start();
$_SESSION[num] = $_GET['id'];
$value1 = "Сингапур";
$value2 = "китайский";
$num = (string)$_GET['id'];
$n = (string)$_GET['id'];
if(isset($_COOKIE[item])) {
  echo $_COOKIE[item];
} else if(!isset($_COOKIE[item])) {
  setcookie("item", $num, time()+3600);
}
if(isset($_COOKIE[number])) {
  echo $_COOKIE[number];
} else if(!isset($_COOKIE[number])) {
  setcookie("number", $n, time()+3600);
}

if(isset($_SESSION[num])) {
  echo $_SESSION[num];
} else if(!isset($_SESSION[num])) {
  $_SESSION[num] = $_GET['id'];
}

$arr = array("first", "second", "third");
setcookie("user", serialize($arr), time()+100);
$usr = unserialize(stripcslashes($_COOKIE['user']));
print($usr[0]);

$_SESSION[num2][] = $_GET['id'];
setcookie("user2", serialize($_SESSION[num2]), time()+100);
$usr2 = unserialize(stripcslashes($_COOKIE['user2']));
print($usr2[0]);


setcookie("city", $value1);
setcookie("language", $value2, time()+3600);
setcookie("item", $num, time()+3600);
setcookie("number", $n, time()+3600);
print_r($_COOKIE[city]);
print_r($_COOKIE[language]);
print_r($_COOKIE[item]);
print_r($_SESSION[num]);
print_r($_COOKIE[number]);
//$res = $db->query("SELECT * FROM tovary WHERE id='$_GET[id]'");
//$bread = mysqli_fetch_assoc($res);
//setcookie("items", "", time() + 60, '/');
//$_SESSION[item][] = $_GET[id];
//print_r($_COOKIE[items]);

//$item = $_GET[id];
//setcookie("message", "welcome", time() + 60, "/");
//$items = $_GET[id];
//$i = $items;
//setcookie("items", $i, time() + 60, "/");
//$item_array[] = unserialize(stripcslashes($_COOKIE['items']));
//print_r($item_array);

//setcookie("message", "$_GET[id]", time() + 60, "/");
//$_COOKIE['items'][] = $_GET[id];
//echo "cookie установлены. Приветствие: $_COOKIE[message]";
//echo "cookie установлены. Приветствие: $_COOKIE[items]";
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

//$items_id = $_GET[id]; 
//setcookie("items","$_GET[id]", time() + 60); // 86400 = 1 день в секундах
//$item_array[] = unserialize(stripcslashes($_COOKIE['view_items']));
//$item_array=array_unique($item_array);
//$item_array=array_values($item_array);
//$item_array=array_reverse($item_array);  
//print_r($_COOKIE[items]);
//echo $_COOKIE[items];

?>