<?php

use yii\db\Migration;

/**
 * Handles the creation of table `industry`.
 */
class m170522_123726_create_industry_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('industry', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->insert('industry',
              [
           'id' => '1',
           'name' => 'Мясная'
              ]
        );

        $this->insert('industry',
              [
           'id' => '2',
           'name' => 'Молочная'
              ]
        );

        $this->insert('industry',
              [
           'id' => '3',
           'name' => 'Строительная'
              ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('industry');
    }
}
