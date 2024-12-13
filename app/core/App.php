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
        $url = $this->getUrl(); //lay duong link
        $urlParts = explode('/', $url); //cat duong link thanh cac chuoi =>
        // urlParts la mot chuoi chua url vd url = home/index => urlParts = ['home','index']

        $controllerName = ucfirst($urlParts[0]) . 'Controller';
        // urlParts = ['home','index'] => HomeController

        $action = isset($urlParts[1]) ? $urlParts[1] : 'index';
        // urlParts = ['home','index'] => acction = index (ham co trong home controller)

        $params = array_slice($urlParts, 2);
        //lay tham so truyen vao

        if (file_exists('./app/controllers/' . $controllerName . '.php')) {
            require_once './app/controllers/' . $controllerName . '.php';
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $action)) //kiem tra ham $action co trong HomeController k (o day la ham index)
                {
                    call_user_func_array([$controller, $action], $params);
                     //action la index => goi ham index co trong HomeController
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
