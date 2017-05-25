<?php

use yii\db\Migration;

/**
 * Handles the creation of table `provider`.
 */
class m170522_123611_create_provider_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
      
        $this->createTable('provider', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        Yii::$app->db->createCommand()->batchInsert('provider', ['id', 'name'], [
            [1, 'Донецэнерго'],
            [2, 'Донецкуголь'],
        ])->execute();
      
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('provider');
    }
}
