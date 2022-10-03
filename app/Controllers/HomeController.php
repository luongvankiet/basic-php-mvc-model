<?php

namespace App\Controllers;

use App\Core\Helper;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('home');
    }
}
