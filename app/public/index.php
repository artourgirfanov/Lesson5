<?
include dirname(__DIR__) . '/vendor/autoload.php';

new \Twig\Loader\FilesystemLoader();

$controllerName = 'user';
if (!empty(trim($_GET['c']))) {
    $controllerName = trim($_GET['c']);
}

$actionName = '';
if (!empty(trim($_GET['a']))) {
    $actionName = trim($_GET['a']);
}

$controllerClass = 'app\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {

    $renderer = new \app\services\RenderServices();
    /** @var \app\controllers\Controller $controller */
    $controller = new $controllerClass($renderer);
    echo $controller->run($actionName);
} else {
    echo '404';
}



