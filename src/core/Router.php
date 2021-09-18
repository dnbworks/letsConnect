<?php

namespace app\core;

use app\core\exception\NotFoundException;
use app\core\Response;

class Router {

    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false){
            throw new NotFoundException();
        }

        if(is_string($callback)){
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            /**
             * @var $controller \thecodeholic\phpmvc\Controller
             */
            $controller = new $callback[0]();
            Application::$app->controller =  $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach($controller->getMiddlewares() as $middleware){
                $middleware->execute();
            }
        }


        return call_user_func($callback, $this->request, $this->response);
     
    }

    public function renderView($view, $params = []){
 
        
        $layout = $this->renderLayout();
        $content = $this->renderContent($view, $params);


        return str_replace("{{content}}", $content, $layout);
    }

    protected function renderLayout(){
        $layout = Application::$app->controller->layout ?? "main";
        ob_start();
        include_once Application::$ROOT_DIR . "/src/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderContent($view, $params){

        foreach($params as $key => $value){
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/src/views/$view.php";
        return ob_get_clean();
    }
}