<?php

namespace app\core;

class Application {

    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public Controller $controller;
    public static string $ROOT_DIR;
    public Database $db;


    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
        // $this->db = new Database();
    }

    public function run(){
        echo $this->router->resolve();
    }
}