<?php

use yii\db\Migration;

class m160429_101755_usermeta extends Migration
{
    public function up()
    {
        $this->createTable('usermeta', [
            'id' => $this->primaryKey(),
            'meta_key' => $this->text(),
            'meta_value' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('usermeta');
    }
}
