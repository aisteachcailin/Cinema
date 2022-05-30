<?php
//начальные данные 
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'cinema';
//соединяемся с сервером БД
$link = mysqli_connect($host, $user, $password, $db_name);
if ($link->connect_errno) exit ('Ошибка соединения с БД :(');
$link->set_charset('utf8');
?>