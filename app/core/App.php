<?php
class App
{
    public function __construct()
    {
        $this->handleUrl();
    }

    public function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/home/index';
        }
        return trim($url, '/');
    }

    public function handleUrl()
    {
        $url = $this->getUrl();
        $urlParts = explode('/', $url);

        $controllerName = ucfirst($urlParts[0]) . 'Controller';
        $action = isset($urlParts[1]) ? $urlParts[1] : 'index';
        $params = array_slice($urlParts, 2);

        if (file_exists('./app/controllers/' . $controllerName . '.php')) {
            require_once './app/controllers/' . $controllerName . '.php';
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $action)) {
                    call_user_func_array([$controller, $action], $params);
                } else {
                    echo "404 - Action not found";
                }
            } else {
                echo "404 - Controller class not found";
            }
        } else {
            echo "404 - Controller file not found";
        }
    }
}
