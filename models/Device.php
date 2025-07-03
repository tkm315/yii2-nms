<?php

namespace app\models;

use yii\db\ActiveRecord;

class Device extends ActiveRecord
{
    public static function tableName()
    {
        return 'device';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'string'],
        ];
    }
}
