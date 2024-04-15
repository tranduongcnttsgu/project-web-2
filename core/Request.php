<?php

namespace core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? "/";
        $position = strpos($path, "?");
        if (!$position) {
            return $path;
        }
        $this->getBody();
        if ($this->method() === "post") {
            $this->getBodyJson();
        }
        return substr($path, 0, $position);
    }
    public function method()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        return strtolower($method);
    }
    public function getBody()
    {
        $body = [];
        switch ($this->method()) {
            case 'get': {
                    foreach ($_GET as $key => $value) {
                        $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
                break;
            case 'post': {
                    foreach ($_POST as $key => $value) {
                        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
                break;

            default:
                # code...
                break;
        }
        return $body;
    }
    public function isGet()
    {
        return $this->method() === 'get';
    }
    public function isPost()
    {
        return $this->method() === 'post';
    }
    public function getBodyJson()
    {
        $body = [];




        $json_data = file_get_contents("php://input");

        if (!empty($json_data)) {
            $decoded_data = json_decode($json_data, JSON_OBJECT_AS_ARRAY);

            if ($decoded_data !== null) {
                $body = $decoded_data;

                return $body;
            }
        }
    }
}
