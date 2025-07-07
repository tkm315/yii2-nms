<?php

use yii\db\Migration;

class m250707_161312_add_ip_and_device_type_to_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%device}}', 'ip_address', $this->string()->after('name'));
        $this->addColumn('{{%device}}', 'device_type', $this->string()->after('ip_address'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%device}}', 'ip_address');
        $this->dropColumn('{{%device}}', 'device_type');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250707_161312_add_ip_and_device_type_to_device_table cannot be reverted.\n";

        return false;
    }
    */
}
