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
        $this->routes = Route::getAll();
    }

    public function resolve()
    {
        $path = Request::getPath();
        $method = Request::getMethod();

        foreach ($this->routes[$method] as $route => $callback) {
            $params = [];
            $paramKey = [];

            preg_match_all("/(?<={).+?(?=})/", $route, $paramMatches);

            if (!empty($paramMatches[0])) {
                foreach ($paramMatches[0] as $key) {
                    $paramKey[] = $key;
                }
                $route = preg_replace("/(^\/)|(\/$)/", "", $route);
                $reqUri =  preg_replace("/(^\/)|(\/$)/", "", $path);

                $uri = explode("/", $route);
                $indexNum = [];

                foreach ($uri as $index => $param) {
                    if (preg_match("/{.*}/", $param)) {
                        $indexNum[] = $index;
                    }
                }
                $reqUri = explode("/", $reqUri);

                foreach ($indexNum as $key => $index) {
                    if (empty($reqUri[$index])) {
                        continue;
                    }

                    $params[$paramKey[$key]] = $reqUri[$index];

                    $reqUri[$index] = "{.*}";
                }
                $reqUri = implode("/", $reqUri);
                $reqUri = str_replace("/", '\\/', $reqUri);

                if (preg_match("/$reqUri/", $route)) {
                    return $this->route($callback, $params);
                }
            }

            if ($route === $path) {
                return $this->route($callback);
            }
        }

        Response::setStatusCode('404');
        return $this->renderView('404');
    }

    public function route($callback, $params = [])
    {
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback, $this->request, $params);
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
