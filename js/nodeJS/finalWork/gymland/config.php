<? session_start();
//$_SESSION['item'][] = $_GET[id];
//print_r($_SESSION['item']);
//$item_id = $_GET[id];
//print_r($item_id);
//setcookie('view_items',$_SESSION['item'], time() + 86400); // 86400 = 1 день в секундах
//$item_array[] = unserialize(stripcslashes($_COOKIE['view_items']));
//$item_array=array_unique($item_array);
//$item_array=array_values($item_array);
//$item_array=array_reverse($item_array);  
//print_r($_COOKIE['view_items']);
        //print_r($item_array);
//$items=serialize($_SESSION['items_cookie']);
//setcookie("user", $items, time()+86400, "http://gymland.tmweb.ru");
//$usr = unserialize(stripcslashes($_COOKIE['user']));
//$item_array = $usr;

//$item_array=array_unique($usr);
//$item_array=array_values($item_array);
//$item_array=array_reverse($item_array);
/*$db=mysql_connect("localhost","cs04501_gl","dobagi49") or die("Не удалось подключиться к серверу".mysql_error()); 
mysql_select_db("cs04501_gl",$db) or die("Не найдена БД".mysql_error());*/

/*  Пароль */
//define("SALT","lexus");

//mysql_query("SET NAMES 'utf-8'"); 
//session_start();



//$db = mysqli_connect("localhost", "cs04501_gymland", "ilyashax", "cs04501_gymland");
/*$db = mysqli_connect("localhost", "cs04501_gl", "dobagi49", "cs04501_gl"); 
if($db) { 
  echo 'Успешное подключение';
} else echo 'Error';

//mysql_query("SET NAMES 'utf-8'"); 
$sql_select = "SELECT * FROM tovary";
$result = mysqli_query($sql_select);
while($row = mysqli_fetch_assoc($result)) {

echo $row[id];
  
  }*/

$db = mysqli_connect("localhost", "cs04501_gl", "dobagi49", "cs04501_gl");
//$db = mysqli_connect("localhost", "cs04501_gymland", "ilyashax", "cs04501_gymland"); 
/*if($db) { 
  echo 'Успешное подключение';
} else echo 'Error';
$res = $db->query("SELECT * FROM tovary ORDER BY id ASC");
*/

define("SALT","lexus");

/*while($rows = mysqli_fetch_assoc($res)){ 
        echo " id = " . $rows['id'] . "\n";
    }*/
?>


