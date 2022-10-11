<?php

namespace App\Actions;

use App\Core\Application;
use App\DataTransferObjects\LoginData;
use App\DataTransferObjects\RegisterData;
use App\Models\User;
use Exception;

class AuthenticationAction
{
    public function login(LoginData $loginData): bool
    {
        $user = User::getInstance()->find(['email' => $loginData->email]);

        if (!$user) {
            Application::session()->setFlash('error', 'User doesn\'t exist with this email! ');
            return false;
        }

        if (! password_verify($loginData->password, $user->password)) {
            Application::session()->setFlash('error', 'Incorrect password!');
            return false;
        }

        Application::setAuthenticatedUser($user);

        return true;
    }

    public function register(RegisterData $registerData): bool
    {
        try {
            $user = new User($registerData->toArray());
            $user->save();
            return $this->login(new LoginData($registerData->toArray()));
        } catch(Exception) {
            return false;
        }
    }

    public function logout()
    {

    }
}
