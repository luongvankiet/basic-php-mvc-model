<?php

use App\Controllers\Admin\DashboardController;
use App\Controllers\AuthController;
use App\Controllers\CourseController;
use App\Controllers\HomeController;
use App\Core\Route;


//auth routes
Route::get('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::get('/auth/logout', [AuthController::class, 'logout']);

// Client routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'index']);

Route::get('/admin/dashboard', [DashboardController::class, 'index']);
