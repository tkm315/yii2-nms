<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%device}}`.
 */
class m250703_142559_add_status_column_to_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('device', 'status', $this->string()->defaultValue('unknown'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('device', 'status');
    }
}
