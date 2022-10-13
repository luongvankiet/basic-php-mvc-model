<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Course;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function show(Request $request, array $params = [])
    {
        $user = User::getInstance()->where('id', $params['id'])->first();

        if (!$user) {
            return $this->renderPageNotFound();
        }

        return $this->render('users.detail', [
            'user' => $user,
        ]);
    }
}
