<?php

use yii\db\Migration;

/**
 * Class m200405_120205_client_client
 */
class m200405_120205_client_client extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function up()
    {
        $this->createTable('{{%client_client}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'patronymic' => $this->string(),
            'last_name' => $this->string()->notNull(),
            'age' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%client_client}}');
    }
}
