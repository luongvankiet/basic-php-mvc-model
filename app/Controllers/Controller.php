<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Response;

class Controller
{
    public function setLayout($layout)
    {
        Application::setLayout($layout);
    }

    public function renderPageNotFound()
    {
        Response::setStatusCode('404');
        return Application::renderView('404');
    }


    public function render($view, $params = [])
    {
        return Application::renderView($view, $params);
    }

    public function redirect($path = "/")
    {
        return Response::redirect($path);
    }

    public function redirectBack()
    {
        return Response::redirectBack();
    }
}
