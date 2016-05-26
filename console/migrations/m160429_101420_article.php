<?php

use yii\db\Migration;

class m160429_101420_article extends Migration
{
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'link' => $this->text()->notNull(),
            'title' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'author' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'likes' => $this->integer(),
            'dislikes' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('article');
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
