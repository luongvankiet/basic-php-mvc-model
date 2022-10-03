<?php

namespace App\Core;

use App\Models\User;

class Application
{
    public static $app;
    public ?User $authenticatedUser = null;
    public Session $session;
    public static $config;

    public function __construct()
    {
        self::$app = $this;
        $primaryKey = Helper::session()->get('user');

        if ($primaryKey) {
            $this->setAuthenticatedUser(User::getInstance()->find(['id' => $primaryKey]) ?? null);
        }
    }

    public function run()
    {
        echo (new Router())->resolve();
    }

    public function setAuthenticatedUser(?User $user = null)
    {
        if (!$user) {
            return;
        }

        $this->authenticatedUser = $user;
        $primaryKey = $user->getPrimaryKey();
        $this->session->set('user', $user->{$primaryKey});
    }
}
