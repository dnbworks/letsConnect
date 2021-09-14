<?php

namespace app\controllers;


use app\core\Controller;
use app\core\Request;
use app\models\LoginModel;
use app\models\RegisterModel;

class AuthController extends Controller{
    
    public function login(Request $request)
    {
        $this->setLayout('Auth');

        $loginModel = new LoginModel();
        if($request->isPost()){
            $loginModel->loadData($request->getBody());

            if($loginModel->validate() && $loginModel->signIn()){

                return 'login success';
            }

            // echo '<pre>';
            // var_dump($loginModel);
            // echo '</pre>';
        

            return $this->render('login', ["model" => $loginModel]);
        }

        

        return $this->render('login', ["model" => $loginModel]);
    }

    public function register(Request $request)
    {   
        $this->setLayout('Auth');

        $registerModel = new RegisterModel();
        if($request->isPost()){
            $registerModel->loadData($request->getBody());

            if($registerModel->validate() && $registerModel->register()){

                return 'register success';
            }

            // echo '<pre>';
            // var_dump($request->getBody());
            // echo '</pre>';


            return $this->render('register', ["model" => $registerModel]);
        }

     

        return $this->render('register', ["model" => $registerModel]);
    }
}