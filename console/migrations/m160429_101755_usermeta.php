<?php

use yii\db\Migration;

class m160429_101755_usermeta extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('usermeta', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'meta_key' => $this->text(),
            'meta_value' => $this->text(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('usermeta');
    }
}
