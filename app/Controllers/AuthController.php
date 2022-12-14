<?php

namespace App\Controllers;

use App\Actions\AuthenticationAction;
use App\Controllers\Controller;
use App\Core\Application;
use App\Core\Request;
use App\Core\Response;
use App\DataTransferObjects\LoginData;
use App\DataTransferObjects\RegisterData;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->setLayout('layouts.auth');

        if ($request->isGet()) {
            return $this->render('auth.login');
        }

        $loginData = new LoginData($request->getBody());

        if ($loginData->validate() && (new AuthenticationAction())->login($loginData)) {
            Application::session()->setFlash('success', 'Successfully login!');
            return Response::redirect('/');
        }

        return $this->render('auth.login', [
            'data' => $loginData
        ]);
    }

    public function register(Request $request)
    {
        $this->setLayout('layouts.auth');

        if ($request->isGet()) {
            return $this->render('auth.register');
        }

        $registerData = new RegisterData($request->getBody());

        if ($registerData->validate() && (new AuthenticationAction())->register($registerData)) {
            Application::session()->setFlash('success', 'Successfully register!');
            Response::redirect('/');
        }

        return $this->render('auth.register', [
            'data' => $registerData
        ]);
    }

    public function logout()
    {
        Application::setAuthenticatedUser(null);
        Application::session()->remove('user');
        return $this->redirect('/');
    }
}
