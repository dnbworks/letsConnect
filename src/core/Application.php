<?php

namespace app\core;

use app\models\UserModel;

class Application {

    public Router $router;
    public Request $request;
    public Response $response;
    public string $userClass;
    public static Application $app;
    public Controller $controller;
    public static string $ROOT_DIR;
    public Database $db;
    public Session $session;
    public ?UserModel $user;


    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        $this->userClass = $config['userClass'];
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();

        $userId = Application::$app->session->get('user');
        if ($userId) {
            $key = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$key => $userId]);
        } else {
            $this->user = NULL;
        }
    }

    public function login(UserModel $user){
        $this->user = $user;
        $primaryKey = $user::primaryKey();
        $value = $user->{$primaryKey};
        Application::$app->session->set('user', $value);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function IsGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try{
            echo $this->router->resolve();
        }catch(\Exception $e){
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
        
    }
}