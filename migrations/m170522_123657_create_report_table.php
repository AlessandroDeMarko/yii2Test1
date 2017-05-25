<?php

use yii\db\Migration;

/**
 * Handles the creation of table `report`.
 */
class m170522_123657_create_report_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('report', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer(),
            'amount_of_workers' => $this->integer(),
            'accruals' => $this->integer(),
            'provider_id' => $this->integer(),
            'period' => $this->date(),
        ], 'ENGINE=InnoDB CHARSET=utf8');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('report');
    }
}
