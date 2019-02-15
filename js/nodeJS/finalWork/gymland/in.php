<?php
// переменные для соединения с БД
$host = 'localhost'; / хост
$username = 'cs04501_gl'; // пароль для подключения к БД
$password = 'dobagi49'; // пароль для подлючения к базе данных - на локальном компьютере он может иметь пустое значение.
$database_name = 'cs04501_gl'; // имя БД

    // старый способ соедения с БД
    mysql_connect($host, $username, $password) or die("Не могу соединиться создать соединение");
    
    // выбрать БД. Если ошибка - вывести
    mysql_select_db($database_name) or die(mysql_error());

?>