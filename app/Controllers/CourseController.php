<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return $this->render('courses.list', [
            'courses' => Course::getInstance()->query()->latest()->limit(5)->get(),
            'categories' => Category::getInstance()->get()
        ]);
    }
}
