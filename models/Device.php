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
        [['name', 'status', 'ip_address', 'device_type'], 'string', 'max' => 255],
        [['name'], 'required'],
        [['status'], 'required'],
        [['ip_address'], 'required'],
        [['device_type'], 'required'],
        ];
    }
}
