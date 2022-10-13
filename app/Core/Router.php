<?php

namespace App\Core;

class Router
{
    protected array $routes = [];
    protected Request $request;
    protected Response $response;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->routes = Route::$routes;
    }

    public function resolve()
    {
        $path = Request::getPath();
        $method = Request::getMethod();

        // $parsed_url = parse_url($_SERVER['REQUEST_URI']);
        // Application::dd($parsed_url);
        // foreach ($this->routes[$method] as $uri => $route) {
        //     $string = '^' . $uri . '$';
        //     Application::varDump($string);
        // }

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            Response::setStatusCode(404);
            return $this->renderView('404');
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        if (strpos($view, '.')) {
            $view = implode('/', explode('.', $view));
        }

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        $content = str_replace("@yield('content')", $viewContent, $layoutContent);

        return $content;
    }

    public function renderViewContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace("@yield('content')", $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::layout();

        if (strpos($layout, '.')) {
            $layout = implode('/', explode('.', $layout));
        }

        ob_start();
        include_once Application::rootDir() . '/resources/views/' . $layout . '.php';

        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            ${$key} = $value;
        }

        ob_start();
        include_once Application::rootDir() . '/resources/views/' . $view . '.php';
        return ob_get_clean();
    }
}
