<?php

namespace App\Core;

class Request
{
    protected array $routes = [];

    public static function getPath()
    {

        $parsedUrl = parse_url($_SERVER['REQUEST_URI'] ?? '/');

        $appBase = Application::appBase() . 'index.php';
        if (!$parsedUrl['path']) {
            return '/';
        }

        $path = substr($parsedUrl['path'], strlen($appBase));


        if (!$path) {
            $path = '/';
        }

        return $path;
    }

    public static function getQuery()
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);

        $query = [];
        if ($parsedUrl['query'] ?? false) {
            $split = explode('&', $parsedUrl['query']);
            foreach ($split as $s) {
                $value = explode('=', $s);
                if ($value[0] ?? false && $value[1] ?? false) {
                    $query[$value[0]] = $value[1];
                }
            }
        }

        return $query;
    }

    public static function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody()
    {
        $body = [];

        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = $value;
            }
        }

        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = $value;
            }
        }

        return $body;
    }

    public function input(String $name = '')
    {
        if (!$name) {
            return $this->getBody();
        }

        return $this->getBody()[$name] ?? null;
    }

    public function isGet()
    {
        return $this->getMethod() === 'get';
    }

    public function isPost()
    {
        return $this->getMethod() === 'post';
    }
}
