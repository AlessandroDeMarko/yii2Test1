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

      Yii::$app->db->createCommand()->batchInsert('industry', ['id', 'name'], [
          [1, 'Мясная'],
          [2, 'Молочная'],
          [3, 'Строительная'],
      ])->execute();
      
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('industry');
    }
}
