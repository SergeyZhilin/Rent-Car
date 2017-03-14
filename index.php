<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// for including unknown Classes or files
spl_autoload_register(function ($class) {

    $normalizePath = strtr($class, '\\', DIRECTORY_SEPARATOR) . '.php';

    if ($file = stream_resolve_include_path($normalizePath)) {
        include $file;
    }
});

$url = $_SERVER['REQUEST_URI'];

// Strip query string and decode URL
if (false !== $pos = strpos($url, '?')) {
    $url = substr($url, 0, $pos);
}

// is Main Page
if ($url == '/') {
    $controller = new \controllers\MainController();
    $controller->indexAction();
} else {

    // split to controller name and action name
    $splits = explode('/', trim($url, '/'));
    if (count($splits) != 2) {
        die("404 not found");
    }

    $controller = $splits[0];
    $action = $splits[1];

    $controllerName = '\controllers\\' . ucfirst($controller) . 'Controller';
    $actionName = $action . 'Action';

    // check class is available
    if(class_exists($controllerName)) {

        // create new object
        $class = new $controllerName();
    } else {
        die($controllerName . " class not found");
    }


        // check method is available
        if(method_exists($class, $actionName)) {

            // call method
            $class->$actionName(); }
    else {
        die($actionName . " class not found");
    }


}
//die("404 not found");