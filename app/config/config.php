<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mamakitchen');
// config.php
define('BASE_URL', 'http://localhost/PHP_WebBasicProject');
define('BASE_PATH', dirname(__DIR__));
define('ASSETS_URL', BASE_URL . '/app/assets');
define('COMPONENTS_URL', BASE_URL . '/app/components');
define('ASSETS_PATH', BASE_PATH . '/app/assets');
define('COMPONENTS_PATH', BASE_PATH . '/app/components');


// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
