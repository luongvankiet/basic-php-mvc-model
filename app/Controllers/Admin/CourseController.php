<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Application;
use App\Core\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    public function index()
    {
        $this->setLayout('layouts.admin');
        $courses = Course::getInstance()->query()->latest()->get();
        return $this->render('admin.courses.list', [
            'courses' => $courses
        ]);
    }

    public function edit(Request $request, array $params = [])
    {
        $this->setLayout('layouts.admin');

        $course = Course::getInstance()->where('id', $params['id'])->first();
        $categories = Category::getInstance()->where('id', $params['id'])->get();
        $trainers = User::getInstance()->trainer()->get();

        if (!$course) {
            Application::session()->setFlash('error', 'Course not found!');
            return $this->redirectBack();
        }

        return $this->render('admin.courses.edit', [
            'course' => $course,
            'categories' => $categories,
            'trainers' => $trainers,
        ]);
    }

    public function delete(Request $request, array $params = [])
    {
        $course = Course::getInstance()->where('id', $params['id'])->first();

        if (!$course) {
            Application::session()->setFlash('error', 'Course not found!');
            return $this->redirect('/admin/courses');
        }

        $course->delete();
        Application::session()->setFlash('success', 'Course has been delete successfully!');
        return $this->redirect('/admin/courses');
    }
}
