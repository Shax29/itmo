<!-- Подключаем файл с конфигурацией -->
<?php require("config.php"); ?>
<?php //require("../new 1.php"); ?>
<?php //require("settings.php"); ?>
<?php //require("1.php"); ?>
<?php
// Подключаемся к серверу БД
/*$db_server = 'localhost'; // адрес сервера 
$db_name = 'cs04501_gym'; // имя базы данных
$db_user = 'cs04501'; // имя пользователя
$db_password = 'ilyashax';
$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);*/


// Выбираем БД
//$db = mysql_select_db($db_name, $mysql);
//if (!$db) { die ('Error select db : ' . mysql_error()); }

/*$db_name = 'cs04501_gym'; // имя базы данных
$db = mysqli_connect("localhost", "cs04501", "", "$dbname");
if($db) echo 'Успешное подключение';*/



/*$db_server = 'localhost'; // адрес сервера 
$db_name = 'cs04501_gym'; // имя базы данных
$db_user = 'cs04501@localhost'; // имя пользователя
$db_password = 'ilyashax';

// Подключаемся к серверу БД
$mysql = mysql_connect($db_server, $db_user, $db_password);
//if (!$mysql) { die ('Connection error: ' . mysql_error()); }
*/
// Выбираем БД
//$db = mysql_select_db($db_name, $mysql);
//if (!$db) { die ('Error select db : ' . mysql_error()); }

// Устанавливаем кодировку подключения
//mysql_query("SET NAMES 'utf8'");
//mysql_query("SET CHARACTER SET 'utf8'");

//$db=mysql_connect("localhost","cs04501_gymland","ilyashax") or die("Неверный логин".mysql_error()); 
//mysql_select_db("cs04501_gymland",$db) or die("Не удалось подключиться к БД".mysql_error());

//require_once 'settings.php'; // подключаем скрипт
 
/*$host = 'localhost'; // адрес сервера 
$database = 'cs04501_gym'; // имя базы данных
$user = 'cs04501'; // имя пользователя
$password = 'ilyashax'; // пароль
*/
// подключаемся к серверу
/*$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));*/
 
// выполняем операции с базой данных
     
// закрываем подключение
//mysqli_close($link);
?>  
	<!DOCTYPE HTML>
	<html lang="ru">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<meta name="description" content="" />
		<meta name="keywords" content="спортивное питание" />
		<title>Gymland.ru - интернет-магазин спортивного питания</title>
      
        <link rel="icon" href="http://gymland.tmweb.ru/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="http://gymland.tmweb.ru/favicon.ico" type="image/x-icon" />
		
<?php require("css.php");?>

	</head>

	<body>
<?php require("templates/header.html"); ?>
<?php require("templates/body-viewed-items.html"); ?>
<?php require("templates/footer.html"); ?>
<?php require("js.php"); ?>
	</body>

	</html>