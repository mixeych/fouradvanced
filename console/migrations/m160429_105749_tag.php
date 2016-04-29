<?php

use yii\db\Migration;

class m160429_105749_tag extends Migration
{
    public function up()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'text' => $this->string(64)->notNull(),
        ]);
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
