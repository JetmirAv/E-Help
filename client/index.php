<?php

require 'core/Bootstrap.php';

$router = Router::load('core/Routes.php');

?>

<style>
    <?php include('css/style.css') ?>
</style>

<?php

$uri = rtrim($_SERVER['REQUEST_URI'], '/');

echo "Route";

echo "<br> Complete Uri";
print_r($_SERVER['REQUEST_URI']);
echo "<br>Uri for router";
print_r($uri);
echo "<br>";

require $router->direct($uri);
