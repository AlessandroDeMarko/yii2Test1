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

        Yii::$app->db->createCommand()->batchInsert('company', ['id', 'name', 'inn', 'industry_id'], [
            [1, 'ООО "Союз"', 12345679, 1],
            [2, 'ЗАО "Тест"', 12345678, 2],
            [3, 'ЧП Иванов', 3245987845, 3],
            [4, 'ЧП Петров', 12395486, 3],
        ])->execute();
      
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }
}
