<?php

namespace App\Controllers;

use App\Models\Course;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $topCourses = Course::getInstance()->query()->latest()->limit(3)->get();
        $trainers = User::getInstance()->trainer()->limit(4)->get();

        return $this->render('home', [
            'courses' => $topCourses,
            'trainers' => $trainers,
        ]);
    }
}
