<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model{
    
    public string $firstname = "";
    public string $lastname = "";
    public string $gender = "";
    public string $day = "";
    public string $month = "";
    public string $year = "";
    public string $city = "";
    public string $state = "";
    public string $profile_picture = "";
    public string $email = "";
    public string $password = "";
    public string $confirmPassword = "";

    public function register()
    {
        
    }

    public function Rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'gender' => [self::RULE_REQUIRED],
            'day' => [self::RULE_REQUIRED],
            'month' => [self::RULE_REQUIRED],
            'year' => [self::RULE_REQUIRED],
            'city' => [self::RULE_REQUIRED],
            'state' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 20]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}