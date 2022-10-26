<?php

namespace App\Controllers;

use App\Models\Course;

class ScheduleController extends Controller
{
    public function index()
    {
        $courses = Course::getInstance()->query()->get();

        return $this->render('home', [
            'courses' => $courses,
        ]);
    }
}
