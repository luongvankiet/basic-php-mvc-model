<?php

namespace App\Controllers;

use App\Core\Application;
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $topCourses = Course::getInstance()->query()->latest()->limit(3)->get();
        return $this->render('home', ['courses' => $topCourses]);
    }
}
