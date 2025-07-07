<?php

use yii\db\Migration;

/**
 * Handles updating unknown device status to offline.
 */
class m250107_000000_update_unknown_status_to_offline extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('device', ['status' => 'offline'], ['status' => 'unknown']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Note: This reverses the change, but data loss is possible
        // if there were originally devices with 'offline' status before this migration
        $this->update('device', ['status' => 'unknown'], ['status' => 'offline']);
    }
}