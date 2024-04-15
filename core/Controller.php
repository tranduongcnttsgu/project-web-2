<?php

namespace core;

class Controller
{
    public string $layout = "defaultLayout"; // set layout mat dinh
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    protected function getPayload()
    {
        return Application::$app->request->getBody();
    }
    protected function getPayloadJson()
    {
        return Application::$app->request->getBodyJson();
    }
    protected function  getHeader($name)
    {
        return  $_COOKIE[$name] ?? null;
    }
    protected function cookiePush(string $name, $value, $time, $path)
    {
        setcookie($name, $value, time() + (86400 * 7), $path, httponly: true);
    }
    protected function cookieGet($name)
    {
        return $_COOKIE[$name] ?? null;
    }
    protected function cookieDelete(string $name, $path = "/")
    {
        setcookie($name, "", time() - (86400 * 7), $path, httponly: false);
    }
    protected function responseJSON(string $message = "", bool $success = true, $httpCode = 200, $data = [])
    {
        Application::$app->response->setStatusCode($httpCode);
        $response = ["message" => $message, "success" => $success, "code" => $httpCode, "data" => $data];
        return json_encode($response);
    }
}
