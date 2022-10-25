<?php

namespace App\Core;

use App\Models\Location;
use App\Models\User;
use Locale;

class Application
{
    public static $app;

    protected static $ROOT_DIR = '';
    protected static $APP_URL = '';
    protected static $APP_BASE = '';
    protected static $APP_DOMAIN = '';

    protected static $config = [];
    protected static $env = [];
    protected static $layout = 'layouts.app';

    /** @var \App\Core\Request */
    protected static $request;

    /** @var \App\Core\Response */
    protected static $response;

    /** @var \App\Core\Router */
    protected static $router;

    /** @var \App\Core\Database */
    protected static $db;

    /** @var \App\Core\Session */
    protected static $session;

    protected static $authenticatedUser;

    /** @var array */
    // protected static $locations;

    public function __construct($rootPath, $isMigrating = false)
    {
        self::$app = $this;

        self::$config = [
            'env' => $_ENV ?? []
        ];

        self::$ROOT_DIR = $rootPath;
        self::$router = new Router();
        self::$request = new Request();
        self::$response = new Response();
        self::$session = new Session();
        self::$db = new Database();

        $primaryKey = self::session()->get('user');

        if ($primaryKey) {
            self::setAuthenticatedUser(User::getInstance()->find(['id' => $primaryKey]) ?? null);
        }
    }

    public function run()
    {
        echo (new Router())->resolve();
    }

    public static function currentUser()
    {
        return self::$authenticatedUser;
    }

    public static function setAuthenticatedUser(?User $user = null)
    {
        if (!$user) {
            return;
        }

        self::$authenticatedUser = $user;
        $primaryKey = $user->getPrimaryKey();
        self::session()->set('user', $user->{$primaryKey});
    }

    public static function config($key)
    {
        return self::$config[$key] ?? false;
    }

    public static function env(?string $key = null)
    {
        self::$env = self::$config['env'] ?? [];

        if (!$key) {
            return self::$env;
        }

        return self::$env[$key] ?? false;
    }

    public static function varDump(...$values)
    {
        foreach ($values as $value) {
            echo '<pre>';
            var_dump($value);
            echo '</pre>';
        }
    }

    public static function dd(...$values)
    {
        foreach ($values as $value) {
            echo '<pre>';
            var_dump($value);
            echo '</pre>';
        }
        exit;
    }

    public static function app()
    {
        if (!self::$app) {
            self::$app = new Application(self::$ROOT_DIR);
        }

        return self::$app;
    }

    public static function appDomain()
    {
        return self::$APP_DOMAIN = self::env('APP_DOMAIN');
    }

    public static function appBase()
    {
        return self::$APP_BASE = self::env('APP_BASE');
    }

    public static function appUrl($path = '')
    {
        if (!$path) {
            return self::$APP_URL = self::appDomain() . self::appBase();
        }
        return self::$APP_URL = self::appDomain() . self::appBase() . 'index.php' . (substr($path, 0, 1) === '/' ? '' : '/') . $path;
    }

    public static function assets($path = '')
    {
        return self::appDomain() . self::appBase() . 'public/assets' . (substr($path, 0, 1) === '/' ? '' : '/') . $path;
    }

    public static function rootDir()
    {
        return self::$ROOT_DIR;
    }

    public static function setLayout($layout)
    {
        self::$layout = $layout;
    }

    public static function layout()
    {
        return self::$layout;
    }

    public static function renderView($view, $params = [])
    {
        if (!self::$router) {
            self::$router = new Router();
        }

        return self::$router->renderView($view, $params);
    }

    public static function session()
    {
        if (!self::$session) {
            self::$session = new Session();
        }

        return self::$session;
    }

    public static function db()
    {
        if (!self::$db) {
            self::$db = new Database();
        }

        return self::$db;
    }

    public static function toUnderscore($string, $us = "-"): string
    {
        return strtolower(preg_replace(
            '/(?<=\d)(?=[A-Za-z])|(?<=[A-Za-z])(?=\d)|(?<=[a-z])(?=[A-Z])/',
            $us,
            $string
        ));
    }

    public static function toCamelCase($input, $separator = '_')
    {
        return lcfirst(str_replace($separator, '', ucwords($input, $separator)));
    }
}
