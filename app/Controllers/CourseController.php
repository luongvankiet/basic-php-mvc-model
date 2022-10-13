<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;
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

    public function show(Request $request, array $param)
    {
        /** @var Course */
        $course = Course::getInstance()->where('id', $param['id'])->first();

        if (!$course) {
            return $this->renderPageNotFound();
        }

        return $this->render('courses.detail', [
            'course' => $course,
            'courseLocations' => $course->locations(),
        ]);
    }
}
