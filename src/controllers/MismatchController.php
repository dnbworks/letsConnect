<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\middleware\AuthMiddleware;



class MismatchController extends Controller {

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['edit', 'home']));
    }
    
    public function index(){
        $this->setLayout('landingLayout');
        return $this->render('index');
    }

    public function home(){
        $users = '';
        return $this->render('home', ['users' => $users]);
    }

    public function edit()
    {
        return $this->render('edit-profile');
    }
}