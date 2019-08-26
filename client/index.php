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
echo "<br>";
print_r($uri);
echo "<br>";

require $router->direct($uri);
