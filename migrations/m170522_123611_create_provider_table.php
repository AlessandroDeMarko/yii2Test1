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

        $this->insert('provider',
              [
           'id' => '1',
           'name' => 'Донецэнерго'
              ]
        );

        $this->insert('provider',
              [
           'id' => '2',
           'name' => 'Донецкуголь'
              ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('provider');
    }
}
