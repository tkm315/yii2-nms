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
            [['name', 'ip_address', 'device_type'], 'required'],
            [['name', 'device_type'], 'string', 'max' => 255],
            [['ip_address'], 'string', 'max' => 15],
            [['ip_address'], 'ip'],
            [['status'], 'string'],
            [['device_type'], 'in', 'range' => ['Router', 'Switch', 'Firewall', 'Server', 'Access Point']],
            [['status'], 'in', 'range' => ['online', 'offline', 'unknown']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Device Name',
            'ip_address' => 'IP Address',
            'device_type' => 'Device Type',
            'status' => 'Status',
        ];
    }
}
