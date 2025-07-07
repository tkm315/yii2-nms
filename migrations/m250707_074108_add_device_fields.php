<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%device}}`.
 */
class m250707_074108_add_device_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('device', 'ip_address', $this->string(15)->notNull());
        $this->addColumn('device', 'device_type', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('device', 'device_type');
        $this->dropColumn('device', 'ip_address');
    }
}