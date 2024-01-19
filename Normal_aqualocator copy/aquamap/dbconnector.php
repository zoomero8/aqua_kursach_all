<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'kursach_swimpool';
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', ''); 
define('DB_NAME', 'kursach_swimpool'); 
$mysql = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);


if ($mysql == false) {
    print("Ошибка подключения: " . $mysql->connect_error);
}
?>