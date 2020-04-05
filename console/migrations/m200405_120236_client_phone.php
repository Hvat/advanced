<?php

use yii\db\Migration;

/**
 * Class m200405_120236_client_phone
 */
class m200405_120236_client_phone extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    public function up()
    {
        $this->createTable('{{%client_phone}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'phone_digital' => $this->string(10)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%client_phone}}');
    }
}
