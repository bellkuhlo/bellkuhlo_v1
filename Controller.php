<?php
// core/classes/Controller.php

namespace core\classes;

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        require_once "templates/frontend/{$view}.php";
    }

    protected function adminView($view, $data = [])
    {
        extract($data);
        require_once "templates/admin/{$view}.php";
    }

    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }
}
