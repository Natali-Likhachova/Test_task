<?php

include $_SERVER['DOCUMENT_ROOT'] . '/src/Core/Router/Router.php';

use src\Core\Router\Router;

$router = new Router();
$router->run();
