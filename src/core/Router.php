<?php

namespace app\core;

class Router {

    protected array $routes = [];
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
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
            Application::$app->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if(is_string($callback)){
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        // echo '<pre>';
        // var_dump($callback);
        // echo '</pre>';

        return call_user_func($callback, $this->request);
     
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