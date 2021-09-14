<?php

namespace app\models;


class User {
    
    public string $username = "";
    public string $password = "";

    public function getUsers()
    {
        
    }

    public function getSingleUser()
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];

    }
}