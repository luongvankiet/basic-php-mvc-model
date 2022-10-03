<?php

namespace App\Core;

use App\Core\Application;
use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Core\Router;
use App\Core\Session;

class Helper
{
    protected static $ROOT_DIR = '';
    protected static $APP_URL = '';
    protected static $APP_BASE = '';
    protected static $APP_DOMAIN = '';

    protected static $config = [];
    protected static $env = [];
    protected static $layout = 'layouts.app';

    protected static Application $app;
    protected static Request $request;
    protected static Response $response;
    protected static Router $router;
    protected static Database $db;
    protected static ?Session $session = null;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$router = new Router();
        self::$request = new Request();
        self::$response = new Response();
        self::$session = new Session();

        self::$config = [
            'env' => $_ENV ?? []
        ];
    }

    public static function config($key)
    {
        return self::$config[$key] ?? false;
    }

    public static function env($key)
    {
        self::$env = self::$config['env'];
        return self::$env[$key] ?? false;
    }

    public static function dd($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        exit;
    }

    public static function app()
    {
        return self::$app = new Application(self::$ROOT_DIR);
    }

    public static function appDomain()
    {
        return self::$APP_DOMAIN = self::env('APP_DOMAIN');
    }

    public static function appBase()
    {
        return self::$APP_BASE = self::env('APP_BASE');
    }

    public static function appUrl()
    {
        return self::$APP_URL = self::appDomain() . self::appBase();
    }

    public static function assets($path)
    {
        return self::appUrl() . '/assets' . (substr($path, 0, 1) === '/' ? '' : '/') . $path;
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
}
