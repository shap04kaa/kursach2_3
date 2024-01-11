<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ParkNRide');
$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if ($connect == false) {
	print("Ошибка подключения: " . $connect->connect_error);
}
?>