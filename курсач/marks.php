<?php
require("connectdb.php");

// Получение всех широт из базы данных
$queryLatitude = "SELECT latitude FROM parkings";
$resultLatitude = $connect->query($queryLatitude);

// Создание массива для хранения всех широт
$points_lat = [];
while ($row = $resultLatitude->fetch_assoc()) {
    $points_lat[] = $row['latitude'];
}

// Получение всех долгот из базы данных
$queryLongitude = "SELECT longitude FROM parkings";
$resultLongitude = $connect->query($queryLongitude);

// Создание массива для хранения всех долгот
$points_long = [];
while ($row = $resultLongitude->fetch_assoc()) {
    $points_long[] = $row['longitude'];
}
?>