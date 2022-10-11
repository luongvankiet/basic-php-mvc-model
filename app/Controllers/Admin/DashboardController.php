<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $this->setLayout('layouts.admin');
        return $this->render('dashboard');
    }
}
