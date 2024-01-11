<?php
require("marks.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>ParkNRide</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Блок с названием проекта и описанием -->
<header class="bg-primary text-white text-center">
    <div class="container">
        <h1 class="display-4">ParkNRide</h1>
        <p class="lead">Удобные пересадки с машины на метро!</p>
        
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#" style="font-size: 20px; ">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" style="font-size: 20px; ">Все парковки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="auth.php" style="font-size: 20px; ">Авторизация</a>
            </li>
            </ul>
        </div>
    </nav>
</div>
</header>

<!-- Блок с основными особенностями/преимуществами -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Особенность 1: Находи пересадки -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title text-center">Находи пересадки</h2>
                        <p class="card-text text-center">Находи удобные для тебя автостоянки рядом с метро, пересаживайся и не стой в пробках в центре Москвы</p>
                    </div>
                </div>
            </div>
            <!-- Особенность 2: Парковки для всех -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title text-center">Парковки для всех</h2>
                        <p class="card-text text-center">На сайте представлены как платные, так и бесплатные парковки, поэтому каждый найдет подходящий вариант для себя </p>
                    </div>
                </div>
            </div>
            <!-- Особенность 3: Добавляй парковки -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title text-center">Добавляй парковки</h2>
                        <p class="card-text text-center">Регестрируйся на сайте, добавляй парковки и помоги другим пользователям находить удобные места для автомобилей</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="map" class="map"></div>
<script src="https://api-maps.yandex.ru/2.1/?apikey=3d8e5ed6-c333-4ed0-a350-0c1b6e3957c5&lang=ru_RU"></script>
<script>
    let center = [55.727892212784184,37.583109902444946];

    // Создаем массивы с координатами точек из PHP массивов
    var points_lat = [<?= implode(',', $points_lat) ?>];
    var points_long = [<?= implode(',', $points_long) ?>];

    function init() {
        var map = new ymaps.Map('map', {
            center: center,
            zoom: 10
        });

        map.controls.remove('geolocationControl');
        map.controls.remove('searchControl');
        map.controls.remove('trafficControl');
        map.controls.remove('typeSelector');
        map.controls.remove('fullscreenControl');
        map.controls.remove('zoomControl');
        map.controls.remove('rulerControl');
        // map.behaviors.disable(['scrollZoom']);

        // Добавляем метки на карту для каждой точки из массивов
        for (let i = 0; i < points_lat.length; i++) {
            let currentPoint = [points_lat[i], points_long[i]];

            let placemark = new ymaps.Placemark(currentPoint, {}, {
                iconLayout: 'default#image',
                iconImageHref: 'images/marker1_blue.svg',
                iconImageSize: [30, 30],
                iconImageOffset: [-17, -25]
            });

            map.geoObjects.add(placemark);
        }
    }

    ymaps.ready(init);
</script>
    
<div class="container mt-4">
    <h3>Список координат:</h3>
    <ul>
        <?php for ($i = 0; $i < count($points_lat); $i++): ?>
            <li><?= $i + 1 ?>. Широта: <?= $points_lat[$i] ?>, Долгота: <?= $points_long[$i] ?></li>
        <?php endfor; ?>
    </ul>
</div>

<!-- Подвал -->
<footer class="py-3 bg-dark">
    <div class="container text-center text-white">
        <p>&copy; 2024 ParkNRide</p>
    </div>
</footer>

<!-- Скрипты Bootstrap (необходимы для работы компонентов) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>