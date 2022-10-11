<?php

namespace App\Core;

class Request
{
    protected array $routes = [];

    public static function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        $appBase = Application::appBase();

        $path = substr($path, strlen($appBase));

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
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
