<?php

use yii\db\Migration;

class m160429_110249_tag_relations extends Migration
{
    public function up()
    {
        $this->createTable('tag_relations', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('tag_relations');
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
