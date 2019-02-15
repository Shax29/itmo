<?php
// Подключаемся к серверу БД
$db_server = 'localhost'; // адрес сервера 
$db_name = 'cs04501_gym'; // имя базы данных
$db_user = 'cs04501'; // имя пользователя
$db_password = 'ilyashax';
$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);
?>