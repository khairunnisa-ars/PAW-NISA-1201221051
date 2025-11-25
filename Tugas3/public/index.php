<?php
define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/public/config.php';

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
$url = explode('/', $url);

$controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'AuthController';
$method = $url[1] ?? 'index';

$controllerFile = BASE_PATH . '/app/controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "Method tidak ditemukan.";
    }
} else {
    echo "Controller tidak ditemukan.";
}
?>
