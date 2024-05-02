<?php

namespace core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {

            $this->response->setStatusCode(404);
            $params  = [
                "titleButton" => "go home",
                "buttonLink" => "http://localhost",
                "script" => ["validation", "login"]
            ];
            return $this->renderView('_404', $params);
        }
        if (is_string($callback)) {

            return $this->renderView($callback);
        }
        if (is_array($callback) && str_contains($path, 'api')) {
            $callback[0] = new $callback[0]();
            return call_user_func($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller =  new $callback[0]();
            $callback[0] =  Application::$app->controller;
            return call_user_func($callback, $this->request);
        }
        return call_user_func($callback);
    }
    public function renderView($callback, $params = [])
    {
        $layoutContent = $this->layoutContent($params);
        $viewContent  = $this->renderOnlyView($callback, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    public function renderViewContent($content, $params = [])
    {
        $layoutContent = $this->layoutContent($params);

        return str_replace('{{content}}', $content, $layoutContent);
    }
    public function layoutContent($params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        $layout = Application::$app->controller->layout ?? "defaultLayout";
        ob_start();
        require_once Application::$ROOTDIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once Application::$ROOTDIR . "/views/pages/$view/$view.php";
        return ob_get_clean();
    }
    public function renderLayout($path, $params = [])
    {

        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once Application::$ROOTDIR . "/views/pages/$path.php";
        return ob_get_clean();
    }
}
