<?php
class App{
    private $__controller, $__action, $__params;
    public function __construct() {
        global $routes;
        $this->handleUrl();
    }
    public function getUrl() {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/Home';
        }
        return $url;
    }
    public function handleUrl() {
        $url = $this->getUrl();  
        $routes = [
            '/' => 'homeController.php',
            '/Home' => 'homeController.php',
            '/AboutUs' => 'homeController.php',

        ];
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
            $routes = array_merge($routes, [
                '/AdminDashboard' => 'adminDashboardController.php',
                '/AdminUsers' => 'adminUsersController.php',
                '/AdminProducts' => 'adminProductsController.php',
                '/AdminOrders' => 'adminOrdersController.php',
                '/' => 'homeController.php',
                '/Home' => 'homeController.php',
            ]);
        }
        foreach ($routes as $route => $controllerFile) {
            if (isset($routes[$url])) {
                require_once './app/controllers/' . $routes[$url];
            } else {
                echo "404 - Page not found";
            }
        }
    }}
?>