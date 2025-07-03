<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m250703_104612_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
        ]);
// Insert admin user (username=admin, password=admin)
$this->insert('{{%user}}', [
    'username' => 'admin',
    'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
]);

$this->insert('{{%user}}', [
    'username' => 'user1',
    'password_hash' => Yii::$app->security->generatePasswordHash('1'),
]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
