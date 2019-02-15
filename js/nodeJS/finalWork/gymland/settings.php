<?php
$db_server = 'localhost'; // адрес сервера 
//$db_name = 'cs04501_gym'; // имя базы данных
$db_name = 'cs04501_gl'; // имя базы данных
$db_user = 'cs04501'; // имя пользователя
$db_password = 'DobaGI49';

$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);
// Устанавливаем кодировку подключения
//mysql_query("SET NAMES 'utf8'");
//mysql_query("SET CHARACTER SET 'utf8'");
?>