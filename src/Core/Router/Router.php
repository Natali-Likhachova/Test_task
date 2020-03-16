<?php

namespace src\Core\Router;

use Controller\NotFound;

class Router
{
    /**
     * @return void
     */
    public function run(): void
    {
        $requestUri = substr( $_SERVER['REDIRECT_URL'], 1);
        include $_SERVER['DOCUMENT_ROOT'] . '/src/config/config.php';
        /** @var array $config */
        $controllerName = $config['routes'][$requestUri] ?? NULL;

        if ($controllerName) {
            $controllerPath = str_replace('\\', '/', $controllerName);
            $controllerPath = $_SERVER['DOCUMENT_ROOT'] . '/src/' . $controllerPath . '.php';
            include $controllerPath;
            $controllerName = '\\' . $controllerName;
            $controller = new $controllerName();
        }
        else {
            include $_SERVER['DOCUMENT_ROOT'] . '/src/Controller/NotFound.php';
            $controller = new NotFound();
        }

        echo json_encode($controller->execute());
    }
}
