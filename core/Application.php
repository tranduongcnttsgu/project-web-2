<?php

namespace core;

class Application
{
    public static string $ROOTDIR;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $database;

    public function init(string $path, $config)
    {
        self::$ROOTDIR = $path;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database($config);
    }
    public function run()
    {
        $req = $this->request->getPath();
        if (str_contains($req, 'api')) {
            header('Content-type: application/json');
            echo json_encode($this->router->resolve());
        } else {
            echo  $this->router->resolve();
        }
    }
}
