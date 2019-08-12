<?php
$router->define([
    '' => 'controllers/static/home.php',
    '/' => 'controllers/static/home.php',
    '/index' => 'controllers/static/home.php',
    '/about' => 'controllers/static/about.php',
    '/profile' => 'controllers/me.php',
    '/login' => 'controllers/login.php',
    '/diseases' => 'controllers/static/diseases.php',
    '/chat' => 'controllers/chat.php',
    '/register' => 'controllers/login.php',
    '/patient/:id' => 'controllers/patient/show.php',
    '/doctor/:id' => 'controllers/doctor/show.php',
]);