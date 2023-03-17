<?php
// core/helpers/router.php

function getControllerMethodFromUrl()
{
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url = trim($url, '/');

    // Remove the "bellkuhlo" directory from the URL
    $url = preg_replace('#^bellkuhlo/?#', '', $url);

    if ($url === '') {
        return [
            'controller' => 'FrontendController',
            'method' => 'index'
        ];
    }

    $segments = explode('/', $url);

    if ($segments[0] === 'admin') {
        $controller = 'AdminController';

        if (count($segments) > 1) {
            $method = $segments[1];
        } else {
            $method = 'dashboard';
        }
    } else {
        $controller = 'FrontendController';
        $method = $segments[0];
    }

    return [
        'controller' => $controller,
        'method' => $method
    ];
}

function loadControllerMethod($controller, $method)
{
    $controllerName = 'Controllers\\' . $controller;
    $controllerInstance = new $controllerName;

    if (!method_exists($controllerInstance, $method)) {
        http_response_code(404);
        die('404 Not Found');
    }

    $controllerInstance->$method();
}
