<?php

use App\Controllers\Admin\DashboardController;
use App\Controllers\AuthController;
use App\Controllers\BlogController;
use App\Controllers\CourseController;
use App\Controllers\HomeController;
use App\Controllers\LocationController;
use App\Controllers\MemberplanController;
use App\Controllers\UserController;
use App\Core\Route;

use App\Controllers\Admin\CourseController as AdminCourseController;
use App\Controllers\Admin\LocationController as AdminLocationController;
use App\Controllers\Admin\UserController as AdminUserController;

//auth routes
Route::get('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::get('/auth/logout', [AuthController::class, 'logout']);

// Client routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);
Route::get('/memberplans', [MemberplanController::class, 'index']);
Route::get('/locations', [LocationController::class, 'index']);

Route::get('/schedules', [ScheduleController::class, 'show']);
Route::get('/profile/{id}', [UserController::class, 'show']);
Route::post('/sendEmail', [HomeController::class, 'sendEmail']);

Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/courses', [AdminCourseController::class, 'index']);
Route::get('/admin/courses/{id}/edit', [AdminCourseController::class, 'edit']);
Route::post('/admin/courses/{id}/delete', [AdminCourseController::class, 'delete']);



Route::get('/admin/locations', [AdminLocationController::class, 'index']);
Route::get('/admin/users', [AdminUserController::class, 'index']);
