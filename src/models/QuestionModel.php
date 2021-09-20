<?php

namespace app\models;

use app\core\DbModel;


class QuestionModel extends DbModel
{
    
    public static function tableName(): string
    {
        return 'mismatch_response';
    }

    public function attributes(): array
    {
        return ['Appearance', 'Entertainment', 'Food', 'People', 'Activity'];
    }
      

    public function Rules(): array
    {
        return [
            'Appearance' => [],
            'Food' => [],
            'Entertainment' => [self::RULE_REQUIRED],
            'Activity' => [self::RULE_REQUIRED],
            'People' => [self::RULE_REQUIRED],
    
        ];
    }

    public static function primaryKey(): string
    {
        return 'user_id';
    }

   
}