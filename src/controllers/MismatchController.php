<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\middleware\AuthMiddleware;
use app\models\UserModel;
use app\models\QuestionModel;



class MismatchController extends Controller {

    public function __construct()
    {
        if(Application::IsGuest()){
            $this->setLayout('error');
        } 
        $this->registerMiddleware(new AuthMiddleware(['edit', 'home', 'questionaire', 'profile', 'mismatch', 'account']));
    }
    
    public function index(Request $request, Response $response){
        if(!Application::IsGuest()){
            $response->redirect('/home');
            exit;
        } 
       
        $this->setLayout('landingLayout');
        return $this->render('index');
    }

    public function home(){
        $this->setLayout('main');
        $UserModel = new UserModel();
        $users = $UserModel::findAll();
        return $this->render('home', [
            'users' => $users
        ]);
    }

    public function edit()
    {
        $this->setLayout('main');
        return $this->render('edit-profile');
    }

    public function questionaire()
    {
        $this->setLayout('main');
        return $this->render('questionaire');
    }

    public function profile(Request $request, Response $response)
    {   
     
        $UserModel = new UserModel();
        $user = $UserModel::findOne([
            'user_id' => $request->getBody()['id'] ?? Application::$app->user->user_id
        ]);

        $this->setLayout('main');
        return $this->render('view-profile', [
            'user' => $user
        ]);
    }

    public function mismatch()
    {
        $this->setLayout('main');
        return $this->render('mismatch');
    }

    public function account()
    {
        $this->setLayout('main');
        return $this->render('account');
    }
}