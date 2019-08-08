<?php

require 'core/Bootstrap.php';

$router = Router::load('core/Routes.php');

?>

<style>
    <?php include('css/style.css') ?>
</style>

<?php

$uri = rtrim($_SERVER['REQUEST_URI'], '/');


require $router->direct($uri);
