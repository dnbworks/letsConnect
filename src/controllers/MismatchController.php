<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;


class MismatchController extends Controller{
    
    public function index(){
        $params = [
            'name' => 'welcome on homepage'
        ];
        return $this->render('index', $params);
    }

    public function edit()
    {
        return $this->render('edit-profile');
    }
}