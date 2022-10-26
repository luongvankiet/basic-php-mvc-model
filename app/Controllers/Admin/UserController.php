<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->setLayout('layouts.admin');
        $users = User::getInstance()->query()->latest()->get();
        return $this->render('admin.users.list', [
            'users' => $users
        ]);
    }
}
