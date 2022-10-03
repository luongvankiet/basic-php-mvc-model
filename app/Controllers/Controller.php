<?php

namespace App\Controllers;

use App\Core\Helper;

class Controller
{
    public function setLayout($layout)
    {
        Helper::setLayout($layout);
    }

    public function render($view, $params = [])
    {
        return Helper::renderView($view, $params);
    }
}
