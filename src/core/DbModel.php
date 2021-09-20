<?php

namespace app\core;

use app\core\Model;

abstract class DbModel extends Model{
    abstract public static function tableName(): string;

    abstract public function attributes(): array;

    abstract public static function primaryKey(): string;

    public function save(){
        $tableName = $this->tableName();
       
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);

        // echo '<pre>';
        // var_dump($attributes);
        // echo '</pre>';
        // exit;

        $statement = self::prepare("INSERT INTO $tableName (". implode(",", $attributes).") VALUES (". implode(",", $params).");");


        foreach($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();

       return true;
        
    }

    public static function findOne($where)
    {
        $tableName =  static::tableName();
        $attributes = array_keys($where);

        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

     
        foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }


        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function findAll()
    {
        $tableName =  static::tableName();

        $statement = self::prepare("SELECT user_id, firstname, lastname, gender, birthdate, city, state, picture FROM $tableName");

        $statement->execute();
        return $statement->fetchAll();
  
    }

    public static function getQuestions()
    {
        $tableName =  static::tableName();

        $statement = self::prepare("SELECT user_id, firstname, lastname, gender, birthdate, city, state, picture FROM $tableName");

        $statement->execute();
        return $statement->fetchAll();
  
    }

    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}