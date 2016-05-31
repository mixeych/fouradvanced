<?php

use yii\db\Migration;

class m160429_105749_tag extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'text' => $this->string(64)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('tag');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
