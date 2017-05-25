<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $amount_of_workers
 * @property integer $accruals
 * @property integer $provider_id
 * @property string $period
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'amount_of_workers'], 'required'],
            [['company_id', 'amount_of_workers', 'accruals', 'provider_id'], 'integer'],
            [['period'], 'date', 'format' => 'Y-m-d'],
            [['period'], 'default', 'value' => date('Y-m-d')],
            [['period'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Предприятие',
            'amount_of_workers' => 'Кол-во работников',
            'accruals' => 'Сумма начислений, тыс.руб.',
            'provider_id' => 'Поставщик',
            'period' => 'Период',
        ];
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id' => 'provider_id']);
    }

    public function getCompanyName()
    {
        $company = $this->company;
     
        return $company ? $company->name : '';
    }

    public function getProviderName()
    {
        $provider = $this->provider;
     
        return $provider ? $provider->name : '';
    }

    public static function getListPeriod()
    {
        $reports = Report::find()->all();

        $items = ArrayHelper::map($reports,'id','period');

        foreach ($items as $key => $item) {
            $items[$key] = self::formatPeriod($item);
        }

        return array_unique ($items);
    }

    public static function getListPeriodDB()
    {
        $reports = Report::find()->all();

        $items = ArrayHelper::map($reports,'id','period');

        return array_unique ($items);
    }

    public function getFormatPeriod()
    {
        return self::formatPeriod($this->period);
    }

    public static function formatPeriod($date)
    {
        return Yii::$app->formatter->asDate($date, 'MMMM yyyy');
    }

    public static function formatDBPeriodFrom($date)
    {
        return Yii::$app->formatter->asDate($date, 'yyyy-MM-01');
    }

    public static function formatDBPeriodTo($date)
    {
        return Yii::$app->formatter->asDate($date, 'yyyy-MM-31');
    }
}
