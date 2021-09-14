<?php

namespace app\core;

abstract class Model {
   const RULE_REQUIRED = 'required';
   const RULE_EMAIL = 'email';
   const RULE_MIN = 'min';
   const RULE_MAX = 'max';
   const RULE_MATCH = 'match';
   const RULE_UNIQUE = 'unique';
   const RULE_OPTIONAL = 'optional';

   public array $errors = [];

   public function loadData($data)
   {
       foreach($data as $key => $value){
           if(property_exists($this, $key)){
            $this->{$key} = $value;
           }
       }
   }

   abstract function Rules(): array;

   public function validate()
   {
   
       foreach($this->Rules() as $attribute => $rules){
           $value = $this->{$attribute};
    
            foreach($rules as $rule){
                $ruleName = $rule;

                if(!is_string($rule)){
                    $ruleName = $rule[0];
                }
                // echo $ruleName . "<br>";
                // echo $value . "<br>";
              
                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                // evaluate the value of it is a valid email
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                // checks whether the value passes the required min length
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                // checks whether the value surpasses the required max length
                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
                // checks whether the password matches the confirm password
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}){
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
            } 
       }

       return empty($this->errors);
   }

   public function errorMessages()
   {
       return [
        self::RULE_REQUIRED => 'This field is required',
        self::RULE_EMAIL => 'This field must be a valid email',
        self::RULE_MIN => 'Min length of this field must be {min}',
        self::RULE_MAX => 'Min length of this field must be {max}',
        self::RULE_MATCH => 'This field must be the same as {match}',
        self::RULE_UNIQUE => 'Record with this {field} already exists',
       ];
   }

   public function addError(string $attribute, string $rule, $params = [])
   {
        $errorMessage = $this->errorMessages()[$rule] ?? "";
        // replace the placeholder {max/min} with the actual number
        foreach($params as $key => $value){
            $errorMessage = str_replace("{{$key}}", $value, $errorMessage);
        }

        $this->errors[$attribute][] = $errorMessage;
   }

   public function hasError($attribute)
   {
       return $this->errors[$attribute] ?? false;
   }

   public function getFirstError($attribute)
   {
       $errors = $this->errors[$attribute] ?? [];
       return $errors[0] ?? '';
   }
}