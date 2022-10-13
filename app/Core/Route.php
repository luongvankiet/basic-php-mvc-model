<?php

namespace App\Core;

class Route
{
    protected static array $routes = [];

    public static function get($path, $callback)
    {
        self::$routes['get'][$path] = $callback;
    }

    public static function post($path, $callback)
    {
        self::$routes['post'][$path] = $callback;
    }

    public static function getAll()
    {
        return self::$routes;
    }
}
