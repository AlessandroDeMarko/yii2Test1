<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m170522_123709_create_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'inn' => $this->integer(),
            'industry_id' => $this->integer(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->insert('company',
              [
           'id' => '1',
           'name' => 'ООО "Союз"',
           'inn' => '12345679',
           'industry_id' => '1'
              ]
        );

        $this->insert('company',
              [
           'id' => '2',
           'name' => 'ЗАО "Тест"',
           'inn' => '12345678',
           'industry_id' => '2'
              ]
        );

        $this->insert('company',
              [
           'id' => '3',
           'name' => 'ЧП Иванов',
           'inn' => '3245987845',
           'industry_id' => '3'
              ]
        );

        $this->insert('company',
              [
           'id' => '4',
           'name' => 'ЧП Петров',
           'inn' => '12395486',
           'industry_id' => '3'
              ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }
}
