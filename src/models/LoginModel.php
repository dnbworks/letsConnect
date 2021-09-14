<?php

namespace app\models;

use app\core\Model;

class LoginModel extends Model{
    
    public string $username = "";
    public string $password = "";

    public function signIn()
    {
        
    }

    public function Rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];

    }
}

